<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ApiResource()
 * @ORM\Entity(repositoryClass="App\Repository\VilleRepository")
 */
class Ville
{
    /**
     * @var int
     *
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @Groups({"offre_read"})
     */
    private $id;

    /**
     * @var string
     * @Assert\NotBlank(message="Veiller saisir une valeur svp")
     * @ORM\Column( type="string", length=30, nullable=true)
     * @Groups({"offre_read"})
     */
    private $libelleVille;


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
    public function getLibelleVille()
    {
        return $this->libelleVille;
    }

    /**
     * @param string $libelleVille
     * @return Ville
     */
    public function setLibelleVille(string $libelleVille): Ville
    {
        $this->libelleVille = $libelleVille;
        return $this;
    }

    public function __toString()
    {
        return $this->getLibelleVille();
    }

}