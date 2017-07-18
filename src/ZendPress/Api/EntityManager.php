<?php

namespace ZendPress\Api;

use ZendPress\Entity\BaseEntity;
use ZendPress\Service\Client;
use ZendPress\Service\Hydrator;
use ZendPress\Structure\ManagerInterface;

class EntityManager implements ManagerInterface
{
    protected $entity;
    protected $hydrator;
    protected $client;

    public function __construct(Hydrator $hydrator, Client $client)
    {
        $this->hydrator = $hydrator;
        $this->client = $client;
    }

    public function setEntity(BaseEntity $entity)
    {
        $this->entity = $entity;
    }

    public function get($id)
    {
        //TODO: Validate param
        $result = $this->client->api($this->entity->getApiEndPoint() . '/' . $id, Client::METHOD_GET)->getBody();
        return $this->hydrator->hydrate(json_decode($result, TRUE), $this->entity);
    }

}