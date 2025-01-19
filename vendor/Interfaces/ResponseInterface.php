<?php

namespace vendor\Interfaces;

use vendor\Enums\ResponseData;

interface ResponseInterface
{
    public function __construct(array|string $data);
    public function getBody() : string;
}