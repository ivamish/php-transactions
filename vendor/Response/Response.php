<?php

namespace vendor\Response;

use vendor\Enums\ResponseData;
use vendor\Interfaces\ResponseInterface;

class Response implements ResponseInterface
{

    private array $data;
    public function __construct(array $data)
    {
        $this->data = $data;
    }

    public function getBody(ResponseData $dataType): string|array
    {
        return $dataType == ResponseData::Array ? $this->data : json_encode($this->data);
    }
}