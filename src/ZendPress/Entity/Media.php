<?php

namespace ZendPress\Entity;

class Media extends BaseEntity
{
    static $API_ENDPOINT = '/media';

    const FIELD_SELF        = 'self';
    const FIELD_UP          = 'up';
    const FIELD_COLLECTION  = 'collection';

    public $self;
    public $up;
    public $collection;

    public function getArrayCopy() {
        throw new \Exception(__METHOD__ . ' was not implemented yet');
    }

    public function exchangeArray(array $array){
        $this->self = $array[Media::FIELD_SELF];
        $this->up = $array[Media::FIELD_UP];
        $this->collection = $array[Media::FIELD_COLLECTION];
    }

    public function toArray()
    {
        throw new \Exception(__METHOD__ . ' was not implemented yet');
    }

    public function getApiEndPoint()
    {
        return Media::$API_ENDPOINT;
    }
}