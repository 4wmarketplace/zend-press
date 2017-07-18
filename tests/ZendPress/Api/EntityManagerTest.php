<?php

class EntityManagerTest extends PHPUnit_Framework_TestCase
{
    public function testCreation()
    {
        $sl = getServiceLocator();
        $em = $sl->get('ZendPress\Api\EntityManager');
        $this->assertInstanceOf('ZendPress\Api\EntityManager', $em);
    }
    public function testSetEntity()
    {
        $sl = getServiceLocator();
        $em = $sl->get('ZendPress\Api\EntityManager');
        $em->setEntity($sl->get('ZendPress\Entity\Post'));
    }

}