<?php
namespace ZendPress\Factory;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;
use ZendPress\Api\CollectionManager;

class CollectionManagerFactory implements FactoryInterface
{

    private $config;

    private $serviceLocator;

    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        $collection = new CollectionManager(
            $serviceLocator->get('ZendPress\Service\Hydrator'),
            $serviceLocator->get('ZendPress\Service\HttpAdapter')
        );
        return $collection;
    }
}