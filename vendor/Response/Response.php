<?php

namespace vendor\Response;

use vendor\Enums\ResponseData;
use vendor\Interfaces\ResponseInterface;

class Response implements ResponseInterface
{

    private array|string $data;
    public function __construct(array|string $data)
    {
        $this->data = $data;
    }

    public function getBody(): string
    {
        return  is_array($this->data) ? json_encode($this->data) : $this->data;
    }
}