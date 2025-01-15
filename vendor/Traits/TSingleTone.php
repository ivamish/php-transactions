<?php

namespace vendor\Traits;

/*
 * Классический синглотон. Будем его использовать для соединения с базой ланных и роутинга
 */
trait TSingleTone
{
    private static ?self $instance = null;

    public static function getInstance(): static
    {
        if(!self::$instance){
            self::$instance = new static();
        }

        return self::$instance;
    }

    private function __construct()
    {
        //close
    }
}