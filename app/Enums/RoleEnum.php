<?php

namespace App\Enums;

enum RoleEnum:string
{
    case ADMIN = 'admin';
    case MANAGER = 'manager';
    case USER = 'user';

    public function id(): string {
        return match($this) {
            RoleEnum::ADMIN => 1,
            RoleEnum::MANAGER => 2,
            RoleEnum::USER => 3,
        };
    }
}
