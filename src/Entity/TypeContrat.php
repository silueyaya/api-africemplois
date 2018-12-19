<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ApiResource
 * @ORM\Entity(repositoryClass="App\Repository\TypeContratRepository")
 */
class TypeContrat
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
     * @ORM\Column(type="string", length=30, nullable=true)
     * @Groups({"offre_read"})
     */
    private $libelleContrat;


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
    public function getLibelleContrat()
    {
        return $this->libelleContrat;
    }

    /**
     * @param string $libelleContrat
     * @return TypeContrat
     */
    public function setLibelleContrat(string $libelleContrat): TypeContrat
    {
        $this->libelleContrat = $libelleContrat;
        return $this;
    }

    public function __toString()
    {
        return $this->getLibelleContrat();
    }


}
