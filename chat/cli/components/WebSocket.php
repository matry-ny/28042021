<?php

namespace cli\components;

use Exception;
use Ratchet\MessageComponentInterface;
use Ratchet\ConnectionInterface;
use SplObjectStorage;

class WebSocket implements MessageComponentInterface
{
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
        foreach ($this->clients as $client) {
            $client->send($msg);
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