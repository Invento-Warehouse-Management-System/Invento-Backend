<?php

namespace App\Enum;

enum RolesEnum: string
{

    case SuperAdmin = 'super_admin';
    case Admin = 'admin';
    case Staff = 'staff';
    case Cashier = 'cashier';

    public static function labels(): array{
        return [
            self::SuperAdmin->value=> 'SuperAdmin',
            self::Admin->value=> 'Admin',
            self::Staff->value=> 'Staff',
            self::Cashier->value=> 'Cashier',
        ];
    }

    public function label(){
        return match ($this){
            self::SuperAdmin => $this->value,
            self::Admin => $this->value,
            self::Staff => $this->value,
            self::Cashier => $this->value,
        };
    }
}
