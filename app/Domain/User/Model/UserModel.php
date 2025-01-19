<?php

namespace app\Domain\User\Model;

use vendor\Datebase\Model;

class UserModel extends Model
{

    protected function setTable(): string
    {
        return 'users';
    }
}