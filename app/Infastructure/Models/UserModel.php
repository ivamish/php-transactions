<?php

namespace app\domains\Infastructure\Model;

use vendor\Datebase\Model;

class UserModel extends Model
{

    protected function setTable(): string
    {
        return 'users';
    }

    protected function relations(): array
    {
        return [
            [
                'table' => 'user_accounts',
                'foreignKey' => 'user_id',
            ]
        ];
    }
}