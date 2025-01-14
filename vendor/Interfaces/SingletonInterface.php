<?php

namespace vendor\Interfaces;

interface SingletonInterface
{
    public static function getInstance() : static;
}