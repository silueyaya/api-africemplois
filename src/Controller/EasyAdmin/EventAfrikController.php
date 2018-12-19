<?php

namespace App\Controller\EasyAdmin;

use App\Entity\Evenement;

class EventAfrikController extends AdminController
{
    /**
     * @param Evenement $entity
     */
    protected function prePersistEntity($entity)
    {
        $entity->setUser($this->getUser());
    }
}
