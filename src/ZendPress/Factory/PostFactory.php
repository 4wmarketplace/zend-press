<?php


namespace ZendPress\Factory;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;
use ZendPress\Entity\Post;

class PostFactory implements FactoryInterface{

    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        return new Post();
    }
}