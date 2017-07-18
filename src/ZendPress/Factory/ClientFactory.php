<?php
namespace ZendPress\Factory;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;
use ZendPress\Service\Client;

class ClientFactory implements FactoryInterface
{

    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        $config = $serviceLocator->get('config');
        $client = new Client();
        $client->setApiUri($config['zendpress']['api']['uri']);
        return $client;
    }
}