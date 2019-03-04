<?php

namespace App\Controller\EasyAdmin;

use App\Entity\Entreprise;

class EntrepriseController extends AdminController
{
    /**
     * @param Entreprise $entity
     */
    protected function prePersistEntity($entity)
    {
        $entity->setImageFile($this->get('speicher210_cloudinary.uploader'));
    }
}


//$this->get('speicher210_cloudinary.uploader')

//    $product->setImageUrl($this->imageUploader->uploadImageToCloudinary($request->files->get('image')));