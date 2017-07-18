<?php

namespace ZendPress\Structure;

interface EntityInterface{
    public function getArrayCopy();
    public function exchangeArray(array $array);
    public function getApiEndPoint();
}