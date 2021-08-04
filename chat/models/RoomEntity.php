<?php


namespace models;

use App;
use components\db\ActiveRecord;
use PDO;

/**
 * Class RoomEntity
 * @package models
 *
 * @property int $id
 * @property string $title
 * @property string $created_at
 */
class RoomEntity extends ActiveRecord
{
    protected function tableName(): string
    {
        return 'rooms';
    }

    public static function getMessagesByRoom(int $roomId): array
    {
        $sql = 'SELECT * FROM messages WHERE room_id = :roomId ORDER BY created_at';
        $stmt = App::get()->db()->getConnection()->prepare($sql);
        $stmt->execute(['roomId' => $roomId]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}