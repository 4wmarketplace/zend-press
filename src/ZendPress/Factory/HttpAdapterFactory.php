<?php
namespace ZendPress\Factory;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;
use ZendPress\Service\HttpAdapter;

class HttpAdapterFactory implements FactoryInterface{

    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        $adapter = new HttpAdapter();
        $adapter->setClient($serviceLocator->get('ZendPress\Service\Client'));
        return $adapter;
    }
}