<?php

namespace ZendPress\Entity;

use ZendPress\Structure\EntityInterface;

abstract class BaseEntity implements EntityInterface{
    static $API_ENDPOINT = '';

    public function __construct($data = null){
        if(is_array($data)){
            $this->exchangeArray($data);
        }
    }

    public function getApiEndPoint()
    {
        return $this::$API_ENDPOINT;
    }
}