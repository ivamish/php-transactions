<?php

namespace vendor\Interfaces;

use vendor\Enums\ResponseData;

interface ResponseInterface
{
    public function __construct(array $data);
    public function getBody(ResponseData $dataType) : string|array;
}