<?php

class HttpAdapterTest extends PHPUnit_Framework_TestCase
{

    protected function getServiceLocator()
    {
        return getServiceLocator();
    }

    public function testSetApiFilter()
    {
        $sl = $this->getServiceLocator();
        $httpAdapter = $sl->get('ZendPress\Service\HttpAdapter');
        $this->assertTrue($httpAdapter->setApiFilter($sl->get('ZendPress\Api\Filter')));
    }

    public function testCountEndPointException()
    {
        $sl = $this->getServiceLocator();
        $httpAdapter = $sl->get('ZendPress\Service\HttpAdapter');
        $this->setExpectedException('Exception');
        $httpAdapter->count();
    }

    public function testCountEndPoint()
    {
        $responseMock = $this->getResponseMock();
        $responseMock->expects($this->exactly(1))->method('getHeaders')->will($this->returnValue($this->getHeadersMock()));
        $clientMock = $this->getClientMock();
        $clientMock->expects($this->exactly(1))->method('api')->will($this->returnValue($responseMock));
        $sl = $this->getServiceLocator();
        $httpAdapter = $sl->get('ZendPress\Service\HttpAdapter');
        $httpAdapter->setClient($clientMock);
        $httpAdapter->setApiEndPoint('/posts');
        $httpAdapter->count();
    }

    public function testGetItems()
    {
        $responseMock = $this->getResponseMock();
        $responseMock->expects($this->exactly(1))->method('getBody')->will($this->returnValue(json_encode(array())));
        $clientMock = $this->getClientMock();
        $clientMock->expects($this->exactly(1))->method('api')->will($this->returnValue($responseMock));
        $sl = $this->getServiceLocator();
        $httpAdapter = $sl->get('ZendPress\Service\HttpAdapter');
        $httpAdapter->setClient($clientMock);
        $httpAdapter->setApiEndPoint('/posts');
        $httpAdapter->getItems(1, 1);
    }

    public function testGetItemsWithFilter()
    {
        $responseMock = $this->getResponseMock();
        $responseMock->expects($this->exactly(1))->method('getBody')->will($this->returnValue(json_encode(array())));
        $clientMock = $this->getClientMock();
        $clientMock->expects($this->exactly(1))->method('api')->will($this->returnValue($responseMock));
        $sl = $this->getServiceLocator();
        $httpAdapter = $sl->get('ZendPress\Service\HttpAdapter');
        $httpAdapter->setClient($clientMock);
        $httpAdapter->setApiEndPoint('/posts');
        $httpAdapter->setApiFilter($sl->get('ZendPress\Api\Filter'));
        $httpAdapter->getItems(1, 1);
    }

    private function getClientMock()
    {
        $clientMock = $this->getMockBuilder('ZendPress\Service\Client')->disableOriginalConstructor()->getMock();
        return $clientMock;
    }

    private function getResponseMock()
    {
        $responseMock = $this->getMockBuilder('Zend\Http\Response')->disableOriginalConstructor()->getMock();
        return $responseMock;
    }

    private function getHeadersMock()
    {
        $headersMock = $this->getMockBuilder('Zend\Http\Headers')->disableOriginalConstructor()->getMock();
        $headersMock->expects($this->exactly(1))->method('get')->with('X-WP-Total')->will($this->returnValue($this->getGenericHeaderMock()));
        return $headersMock;
    }

    private function getGenericHeaderMock()
    {
        $headersMock = $this->getMockBuilder('Zend\Http\Header\GenericHeader')->disableOriginalConstructor()->getMock();
        $headersMock->expects($this->exactly(1))->method('getFieldValue')->will($this->returnValue(0));
        return $headersMock;
    }

}