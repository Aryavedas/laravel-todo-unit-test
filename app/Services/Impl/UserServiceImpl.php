<?php

namespace App\Services\Impl;

use App\Services\UserService;

class UserServiceImpl implements UserService
{
    private $users = [
        "Aryaveda" => "Rahasia"
    ];

    function login(string $user, string $password): bool
    {
        if (!isset($this->users[$user])) {
            return false;
        }
    
        $correctPassword = $this->users[$user];
        if ($password == $correctPassword) {
            return true;
        }

        return false;
    }
}
