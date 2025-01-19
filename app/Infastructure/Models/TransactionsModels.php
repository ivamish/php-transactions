<?php

namespace app\domains\Infastructure\Model;

use vendor\Datebase\Model;

class TransactionsModels extends Model
{

    protected function setTable(): string
    {
        return 'transactions';
    }
}