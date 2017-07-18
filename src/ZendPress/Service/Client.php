<?php
namespace ZendPress\Service;

use Zend\Http\Client as ZendClient;
use Zend\ServiceManager\Exception;
use Zend\Uri\Uri;


class Client extends ZendClient{
    const METHOD_GET = 'GET';

    protected $apiUri;

    /**
     * @param $uri
     * @throws \Exception
     */
    public function setApiUri($uri){
        $this->apiUri = new Uri($uri);
        if(!$this->apiUri->isValid()){
            throw new \Exception('The URI was not correct');
        }
        return true;
    }

    /**
     * @return Uri
     */
    public function getApiUri(){
        return $this->apiUri;
    }

    /**
     * @param $endPoint
     * @param $method
     * @param array $params
     * @return \Zend\Http\Response
     * @throws \Exception
     */
    public function api($endPoint,$method,$params = array()){
        switch($method){
            case self::METHOD_GET:
                return $this->methodGet($endPoint,$params);
            default:
                throw new \Exception("Client method ".$method." is not implemented yet or is not valid!");
                break;
        }
    }

    /**
     * @param $endPoint
     * @param $params
     * @return \Zend\Http\Response
     */
    public function methodGet($endPoint,$params){
        $this->setUri($this->getApiUri().$endPoint);
        $this->setParameterGet($params);
        return $this->send();
    }
}