<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ApiResource
 * @ORM\Entity(repositoryClass="App\Repository\TypeEvenementRepository")
 */
class TypeEvenement
{
    /**
     * @var int
     *
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     * @Assert\NotBlank(message="Veiller saisir une valeur svp")
     * 
     * @ORM\Column(type="string", length=30, nullable=false)
     */
    private $libelleTypeEvenement;


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getLibelleTypeEvenement()
    {
        return $this->libelleTypeEvenement;
    }

    /**
     * @param string $libelleTypeEvenement
     * @return TypeEvenement
     */
    public function setLibelleTypeEvenement(string $libelleTypeEvenement): TypeEvenement
    {
        $this->libelleTypeEvenement = $libelleTypeEvenement;
        return $this;
    }

    public function __toString()
    {
        return $this->getLibelleTypeEvenement();
    }

}
