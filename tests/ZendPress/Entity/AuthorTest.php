<?php

class AuthorTest extends PHPUnit_Framework_TestCase
{

    public function testCreation()
    {
        $author = new \ZendPress\Entity\Author();
        $this->assertInstanceOf('ZendPress\Entity\Author', $author);
        $author->exchangeArray($this->getAuthorMock());
    }

    public function testGetArrayCopy()
    {
        $author = new \ZendPress\Entity\Author();
        $this->setExpectedException('Exception');
        $author->getArrayCopy();
    }

    public function testToArray()
    {
        $author = new \ZendPress\Entity\Author();
        $this->setExpectedException('Exception');
        $author->toArray();
    }

    public function testGetApiEndPoint()
    {
        $author = new \ZendPress\Entity\Author();
        $this->assertStringStartsWith('/', $author->getApiEndPoint());
    }

    public function getAuthorMock()
    {
        return array(
            'ID' => '1',
            'name' => 'test user',
            'slug' => 'test-slug',
            'URL' => 'http://local.domain.com/test',
            'meta' => 'test',
            'avatar' => 'avatar'
        );
    }
}