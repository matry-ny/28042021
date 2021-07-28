<?php

namespace models;

use components\db\ActiveRecord;

/**
 * Class UserEntity
 * @package models
 *
 * @property int $id
 * @property string $name
 * @property string $login
 * @property string $password
 * @property string $birthday
 * @property string $created_at
 * @property string $updated_at
 */
class UserEntity extends ActiveRecord
{
    protected function tableName(): string
    {
        return 'users';
    }

    public function getName(): string
    {
        return $this->name ?: $this->login;
    }
}
