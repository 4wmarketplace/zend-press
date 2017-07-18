<?php

class MediaTest extends PHPUnit_Framework_TestCase
{
    public function testCreation()
    {
        $author = new \ZendPress\Entity\Media();
        $this->assertInstanceOf('ZendPress\Entity\Media', $author);
        $author->exchangeArray($this->getMediaMock());
    }

    public function testGetArrayCopy()
    {
        $author = new \ZendPress\Entity\Media();
        $this->setExpectedException('Exception');
        $author->getArrayCopy();
    }

    public function testToArray()
    {
        $author = new \ZendPress\Entity\Media();
        $this->setExpectedException('Exception');
        $author->toArray();
    }

    public function testGetApiEndPoint()
    {
        $author = new \ZendPress\Entity\Media();
        $this->assertStringStartsWith('/', $author->getApiEndPoint());
    }

    public function getMediaMock()
    {
        return array(
            'self' => 'test-self',
            'up' => 'test-up',
            'collection' => 'test-collection',
        );
    }
}