<?php
// src/Entity/MediaObject.php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiProperty;
use ApiPlatform\Core\Annotation\ApiResource;
use App\Controller\CreateMediaObjectAction;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\File;
use Symfony\Component\Validator\Constraints as Assert;
use Vich\UploaderBundle\Mapping\Annotation as Vich;

/**
 * @ORM\Entity
 * @ApiResource(iri="http://schema.org/MediaObject", collectionOperations={
 *     "get",
 *     "post"={
 *         "method"="POST",
 *         "path"="/media_objects",
 *         "controller"=CreateMediaObjectAction::class,
 *         "defaults"={"_api_receive"=false},
 *     },
 * })
 * @Vich\Uploadable
 */
class MediaObject
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var File|null
     * @Assert\NotNull()
     * @Vich\UploadableField(mapping="user_cv", fileNameProperty="contentUrl")
     */
    public $file;

    /**
     * @var string|null
     * @ORM\Column(nullable=true)
     * @ApiProperty(iri="http://schema.org/contentUrl")
     */
    public $contentUrl;


    /**
     * @var string
     * @Assert\NotBlank(message="Veiller saisir une valeur svp")
     * @ORM\Column(type="string", length=50, nullable=false)
     */
    private $mailEntreprise;

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }
    

    /**
     * Get the value of mailEntreprise
     *
     * @return  string
     */ 
    public function getMailEntreprise()
    {
        return $this->mailEntreprise;
    }

    /**
     * Set the value of mailEntreprise
     *
     * @param  string  $mailEntreprise
     *
     * @return  self
     */ 
    public function setMailEntreprise(string $mailEntreprise)
    {
        $this->mailEntreprise = $mailEntreprise;

        return $this;
    }
}

