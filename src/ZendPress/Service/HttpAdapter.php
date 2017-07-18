<?php
namespace ZendPress\Service;

use Zend\Paginator\Adapter\AdapterInterface;
use ZendPress\Api\Filter;

class HttpAdapter implements AdapterInterface
{
    protected $client;
    protected $filter;
    protected $data = array();
    protected $apiEndPoint;


    /**
     * @param Client $client
     */
    public function setClient(Client $client)
    {
        $this->client = $client;
    }

    /**
     * @param string $apiAndPoint
     */
    public function setApiEndPoint($apiAndPoint)
    {
        $this->apiEndPoint = $apiAndPoint;
    }

    /**
     * @return bool
     */
    public function getApiAndPoint()
    {
        if ($this->apiEndPoint) {
            return $this->apiEndPoint;
        }
        return false;
    }

    /**
     * @param Filter $filter
     * @return bool
     */
    public function setApiFilter(Filter $filter){
        $this->filter = $filter;
        return true;
    }


    /**
     * @return int
     * @throws \Exception
     */
    public function count(){
        if (!$this->getApiAndPoint()) {
            throw new \Exception("API endpoint was not set");
        }
        $response = $this->client->api($this->getApiAndPoint(), Client::METHOD_GET);
        return (int) $response->getHeaders()->get('X-WP-Total')->getFieldValue();
    }

    /**
     * @param int $offset
     * @param int $itemCountPerPage
     * @return mixed
     */
    public function getItems($offset,$itemCountPerPage){
        $page = ($offset/$itemCountPerPage)+1;
        $uri = $this->getUri($itemCountPerPage, $page);
        $request = $this->client->api($uri, Client::METHOD_GET);
        $jsonData = json_decode($request->getBody(), true);
        $this->setData($jsonData);
        return $this->getData();
    }

    /**
     * @param int $itemCountPerPage
     * @param int $page
     * @return string
     */
    private function getUri($itemCountPerPage = 10, $page = 1)
    {
        return $this->getApiAndPoint() . '?filter[posts_per_page]=' . $itemCountPerPage . '&page=' . $page . $this->getFilterString();
    }

    /**
     * @return string
     */
    private function getFilterString()
    {
        $filterString = '';
        if (isset($this->filter)) {
            $filterString = '&' . $this->filter->getUrlQuery();
        }
        return $filterString;
    }

    /**
     * @param array $data
     */
    public function setData($data)
    {
        $this->data = $data;
    }

    /**
     * @return array
     */
    public function getData()
    {
        return $this->data;
    }


}