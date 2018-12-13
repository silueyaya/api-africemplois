<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ORM\Entity(repositoryClass="App\Repository\NiveauEtudeRepository")
 * @ApiResource(
 *          normalizationContext={"groups":{"niv_etud"}},
 *          denormalizationContext={"groups":{"niv_etud"}},
 *     itemOperations={
 *          "get",
 *          "delete",
 *         "put"={
 *             "denormalization_context"={"groups"={"put"}}
 *         }
 *     }
 * )
 */
class NiveauEtude
{
    /**
     * @var int
     *
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @Groups({"put"})
     */
    private $id;

    /**
     * @var string
     * @Assert\NotBlank(message="Veiller saisir une valeur svp")
     * @ORM\Column( type="string", length=30, nullable=true)
     * @Groups({"put"})
     */
    private $libelleNiveauEtude;


    /**
     * Get the value of id
     *
     * @return  int
     */ 
    public function getId()
    {
        return $this->id;
    }



    /**
     * Get the value of libelleNiveauEtude
     *
     * @return  string
     */ 
    public function getLibelleNiveauEtude()
    {
        return $this->libelleNiveauEtude;
    }

    /**
     * Set the value of libelleNiveauEtude
     *
     * @param  string  $libelleNiveauEtude
     *
     * @return  self
     */ 
    public function setLibelleNiveauEtude(string $libelleNiveauEtude)
    {
        $this->libelleNiveauEtude = $libelleNiveauEtude;

        return $this;
    }

    public function __toString()
    {
        return $this->getLibelleNiveauEtude();
    }
}