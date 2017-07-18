<?php

namespace ZendPress\Entity;

class Author extends BaseEntity
{
    static $API_ENDPOINT = '/author';

    const FIELD_ID          = 'ID';
    const FIELD_NAME        = 'name';
    const FIELD_SLUG        = 'slug';
    const FIELD_URL         = 'URL';
    const FIELD_AVATAR      = 'avatar';
    const FIELD_META        = 'meta';

    public $id;
    public $name;
    public $slug;
    public $url;
    public $avatar;
    public $meta;

    public function getArrayCopy() {
        throw new \Exception(__METHOD__ . ' was not implemented yet');
    }

    public function exchangeArray(array $array){
        $this->id       = $array[self::FIELD_ID];
        $this->name     = $array[self::FIELD_NAME];
        $this->slug     = $array[self::FIELD_SLUG];
        $this->url      = $array[self::FIELD_URL];
        $this->avatar   = $array[self::FIELD_AVATAR];
        $this->meta     = $array[self::FIELD_META];
    }

    public function toArray()
    {
        throw new \Exception(__METHOD__ . ' was not implemented yet');
    }

    public function getApiEndPoint()
    {
        return Author::$API_ENDPOINT;
    }
}