<?php

namespace ZendPress\Structure;

use ZendPress\Entity\BaseEntity;

interface ManagerInterface
{
    public function setEntity(BaseEntity $entity);
}