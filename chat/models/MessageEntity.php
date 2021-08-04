<?php


namespace models;

use components\db\ActiveRecord;

/**
 * Class MessageEntity
 * @package models
 *
 * @property int $id
 * @property int $user_id
 * @property int $room_id
 * @property string $text
 * @property int $created_at
 */
class MessageEntity extends ActiveRecord
{
    protected function tableName(): string
    {
        return 'messages';
    }
}