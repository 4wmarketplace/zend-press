<?php

namespace ZendPress\Api;

class Filter
{
    protected $filter = array();

    const CATEGORY_NAME = 'category_name';

    public function addFilter($key,$value){
        // TODO: Filters validator
        $this->filter['filter'][$key] = $value;
        return true;
    }

    public function removeFilter(){
        throw new \Exception(__METHOD__.' was not implemented yet.');
    }

    public function getUrlQuery(){
        return http_build_query($this->filter);
    }


}