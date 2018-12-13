<?php

namespace App\Controller\EasyAdmin;

use App\Entity\Offre;

class OffreController extends AdminController
{
    /**
     * @param Offre $entity
     */
    protected function prePersistEntity($entity)
    {
        $entity->setUser($this->getUser());
    }
}
