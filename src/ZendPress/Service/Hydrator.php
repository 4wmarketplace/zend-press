<?php
namespace ZendPress\Service;

use Zend\ServiceManager\Exception;
use Zend\Stdlib\Hydrator\ArraySerializable;

class Hydrator extends ArraySerializable{
    protected $entity;
}