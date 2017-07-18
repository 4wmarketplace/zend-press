<?php

class FilterTest extends PHPUnit_Framework_TestCase
{

    public function testCreation()
    {
        $sl = getServiceLocator();
        $filter = $sl->get('ZendPress\Api\Filter');
        $this->assertInstanceOf('ZendPress\Api\Filter', $filter);
    }

    public function testAddFilter()
    {
        $sl = getServiceLocator();
        $filter = $sl->get('ZendPress\Api\Filter');
        $this->assertTrue($filter->addFilter('key', 2));
    }

    public function testRemoveFilter()
    {
        $sl = getServiceLocator();
        $filter = $sl->get('ZendPress\Api\Filter');
        $this->setExpectedException('Exception');
        $this->assertTrue($filter->removeFilter('key'));
    }
}