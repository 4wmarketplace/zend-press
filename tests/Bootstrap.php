<?php
chdir(__DIR__);
$loader = include '../vendor/autoload.php';
$loader->add('ZendPress', __DIR__ . '/../src');


function getServiceLocator()
{
    $config = Zend\Config\Factory::fromFile(findParentPath('config') . "/module.config.php");
    $serviceManagerConfig = new \Zend\ServiceManager\Config($config['service_manager']);
    $serviceManager = new \Zend\ServiceManager\ServiceManager($serviceManagerConfig);
    $serviceManager->setService('config', $config);
    return $serviceManager;
}

function  findParentPath($path)
{
    $dir = __DIR__;
    $previousDir = '.';
    while (!is_dir($dir . '/' . $path)) {
        $dir = dirname($dir);
        if ($previousDir === $dir) {
            return false;
        }
        $previousDir = $dir;
    }
    return $dir . '/' . $path;
}