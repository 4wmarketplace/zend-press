<?php

class ClientTest extends PHPUnit_Framework_TestCase
{
    public function testSetApiUri()
    {
        $sl = getServiceLocator();
        $client = $sl->get('ZendPress\Service\Client');
        $this->assertTrue($client->setApiUri('http://test.com'));
        $this->setExpectedException('Exception');
        $client->setApiUri('');
    }

    public function testGetApiUri()
    {
        $serviceLocator = getServiceLocator();
        $client = $serviceLocator->get('ZendPress\Service\Client');
        $this->assertStringStartsWith('http', $client->getApiUri()->toString());
    }

    public function testApi()
    {
        $serviceLocator = getServiceLocator();
        $client = $serviceLocator->get('ZendPress\Service\Client');
        $client->setApiUri('http://google.com');
        $result = $client->api('/posts', $client::METHOD_GET, array());
        $this->assertInstanceOf('Zend\Http\Response', $result);
        $this->_apiFakeMethod();
    }

    protected function _apiFakeMethod()
    {
        $serviceLocator = getServiceLocator();
        $client = $serviceLocator->get('ZendPress\Service\Client');
        $this->setExpectedException('Exception');
        $client->api('/test', 'FAKEMETHOD', array());
    }
}