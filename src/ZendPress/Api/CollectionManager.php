<?php

namespace ZendPress\Api;
use Zend\Paginator\Paginator;
use ZendPress\Entity\BaseEntity;
use ZendPress\Service\HttpAdapter;
use ZendPress\Service\Hydrator;
use ZendPress\Structure\ManagerInterface;

class CollectionManager extends Paginator implements ManagerInterface
{
    protected   $entity;
    protected   $hydrator;
    protected   $adapter;

    public function __construct(Hydrator $hydrator,HttpAdapter $adapter){
        $this->hydrator = $hydrator;
        $this->adapter  = $adapter;
    }

    public function setEntity(BaseEntity $entity)
    {
        $this->entity = $entity;
        $this->adapter->setApiEndPoint($entity->getApiEndPoint());
    }

    public function setApiFilter(Filter $filter, $refresh = false)
    {
        if ($refresh) {
            $this->refresh();
        }
        $this->adapter->setApiFilter($filter);
    }

    public function refresh()
    {
        $this->currentItems = null;
    }

    public function getItemsByPage($pageNumber)
    {
        $items = parent::getItemsByPage($pageNumber);
        foreach ($items as $key => $item) {
        	$entity = new $this->entity;
        	$entity->exchangeArray($item);
        	// TODO: Implement Hydrator
        	//$this->hydrator->hydrate($item, $this->entity);
            $items[$key] = $entity;
        }
        return $items;
    }
}
