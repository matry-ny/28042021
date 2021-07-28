<?php

namespace web\components;

use App;
use models\UserEntity;

class User
{
    private const USER_KEY = 'user';

    private bool $isGuest = true;

    private ?UserEntity $user;

    public function __construct()
    {
        $this->user = App::get()->session()?->get(self::USER_KEY);
        if ($this->user instanceof UserEntity) {
            $this->isGuest = false;
        }
    }

    public function login(UserEntity $userEntity): void
    {
        App::get()->session()?->set(self::USER_KEY, $userEntity);
        $this->user = $userEntity;
        $this->isGuest = false;
    }

    public function logout(): void
    {
        App::get()->session()?->reset();
        $this->user = null;
        $this->isGuest = true;
    }

    public function isGuest(): bool
    {
        return $this->isGuest;
    }

    public function entity(): UserEntity
    {
        return $this->user;
    }
}
