<?php

class PostTest extends PHPUnit_Framework_TestCase
{
    public function testCreation()
    {
        $sl = getServiceLocator();
        $post = $sl->get('ZendPress\Entity\Post');
        $this->assertInstanceOf('ZendPress\Entity\Post', $post);
    }

    public function testExchangeArray()
    {
        $sl = getServiceLocator();
        $post = $sl->get('ZendPress\Entity\Post');
        $postMock = $this->getPostMock();
        $post->exchangeArray($postMock);
        $this->assertSame(
            $postMock['ID'],
            $post->id,
            '"ID" was not set correctly'
        );
    }

    public function testGetArrayCopy()
    {
        $sl = getServiceLocator();
        $post = $sl->get('ZendPress\Entity\Post');
        $this->setExpectedException('Exception');
        $post->getArrayCopy();
    }

    public function testToArray()
    {
        $sl = getServiceLocator();
        $post = $sl->get('ZendPress\Entity\Post');
        $this->setExpectedException('Exception');
        $post->toArray();
    }

    public function getPostMock()
    {
        $author = new AuthorTest();
        $media = new MediaTest();
        return array(
            'ID' => '1',
            'title' => 'Test title',
            'status' => 'Test status',
            'type' => 'test',
            'author' => $author->getAuthorMock(),
            'date' => time(),   // date
            'date_gmt' => time(),   // date_gmt
            'modified' => time(),
            'modified_gmt' => time(),
            'modified_tz' => time(),
            'slug' => 'test',
            'content' => 'content',
            'excerpt' => 'excerpt',
            'parent' => 1,
            'link' => 'http://test.domain.com',
            'guid' => 2,
            'menu_order' => 'excerpt',
            'comment_status' => 'comment_status',
            'ping_status' => 'ping_status',
            'sticky' => 'sticky',
            'format' => 'format',
            'terms' => 'terms',
            'meta' => 'meta',
            'post_thumbnail' => $media->getMediaMock()
        );


    }
}