<?php
namespace ZendPress\Factory;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;
use ZendPress\Api\EntityManager;

class EntityManagerFactory implements FactoryInterface
{

    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        $manager = new EntityManager(
            $serviceLocator->get('ZendPress\Service\Hydrator'),
            $serviceLocator->get('ZendPress\Service\Client')
        );
        return $manager;
    }
}