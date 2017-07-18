<?php

class CollectionManagerTest extends PHPUnit_Framework_TestCase
{


    public function testSetEntity()
    {
        $sl = getServiceLocator();
        $cm = $sl->get('ZendPress\Api\CollectionManager');
        $cm->setEntity($sl->get('ZendPress\Entity\Post'));
    }

    public function testSetApiFilter()
    {
        $sl = getServiceLocator();
        $cm = $sl->get('ZendPress\Api\CollectionManager');
        $cm->setApiFilter($sl->get('ZendPress\Api\Filter'));
    }

    public function testSetApiFilterAndFlush()
    {
        $sl = getServiceLocator();
        $cm = $sl->get('ZendPress\Api\CollectionManager');
        $cm->setApiFilter($sl->get('ZendPress\Api\Filter'), true);
    }

    public function testGetItemsByPage()
    {
        $sl = getServiceLocator();
        $cm = $sl->get('ZendPress\Api\CollectionManager');
        $this->setExpectedException('Exception');
        $cm->getItemsByPage(2);
    }

}