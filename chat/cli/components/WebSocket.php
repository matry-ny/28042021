<?php

namespace cli\components;

use Exception;
use models\MessageEntity;
use Ratchet\MessageComponentInterface;
use Ratchet\ConnectionInterface;
use SplObjectStorage;

class WebSocket implements MessageComponentInterface
{
    private const TYPE_SUBSCRIBE = 'subscribe';
    private const TYPE_MESSAGE = 'message';

    private array $usersToRooms = [];
    private array $roomsToUsers = [];

    protected SplObjectStorage $clients;

    public function __construct()
    {
        $this->clients = new SplObjectStorage();
    }

    public function onOpen(ConnectionInterface $conn): void
    {
        $this->clients->attach($conn);
    }

    public function onMessage(ConnectionInterface $from, $msg): void
    {
        $payload = json_decode($msg, true);
        match ($payload['type']) {
            self::TYPE_SUBSCRIBE => $this->subscribe($from, $payload['data']),
            self::TYPE_MESSAGE => $this->message($payload['data']),
        };
    }

    private function subscribe(ConnectionInterface $connection, array $data): void
    {
        $prevRoom = $this->roomsToUsers[$data['authorId']] ?? null;

        $this->roomsToUsers[$data['authorId']] = $data['roomId'];
        $this->usersToRooms[$data['roomId']][$data['authorId']] = $connection;

        if ($prevRoom
            && $prevRoom !== $data['roomId']
            && is_array($this->usersToRooms[$prevRoom])
            && array_key_exists($data['authorId'], $this->usersToRooms[$prevRoom])
        ) {
            unset($this->usersToRooms[$prevRoom][$data['authorId']]);
        }
    }

    private function message(array $data): void
    {
        $message = new MessageEntity();
        $message->user_id = $data['options']['authorId'];
        $message->room_id = $data['options']['roomId'];
        $message->text = $data['text'];
        $message->created_at = $data['time'];
        $message->save();

        foreach ($this->usersToRooms[$message->room_id] as $client) {
            $client->send(json_encode($message->toArray()));
        }
    }

    public function onClose(ConnectionInterface $conn): void
    {
        $this->clients->detach($conn);
    }

    public function onError(ConnectionInterface $conn, Exception $e): void
    {
        $conn->close();
    }
}