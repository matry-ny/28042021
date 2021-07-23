<?php

namespace models;

use components\db\ActiveRecord;

/**
 * Class UserContactEntity
 * @package models
 *
 * @property int $id
 * @property string $contact
 * @property string $type
 * @property int $user_id
 */
class UserContactEntity extends ActiveRecord
{
    public const TYPE_PHONE = 'phone';
    public const TYPE_EMAIL = 'email';
    public const TYPE_ADDRESS = 'address';

    protected function tableName(): string
    {
        return 'user_contacts';
    }
}
