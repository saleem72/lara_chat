<?php

namespace App\Enums;

enum UserRoleEnum: int {
    case ADMIN = 1;
    case USER = 2;

    public function label()
    {
        return match($this) {
            self::ADMIN => 'Admin',
            self::USER => 'User',
        };
    }
}
