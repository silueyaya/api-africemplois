<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ORM\Entity(repositoryClass="App\Repository\NiveauExperienceGlobalRepository")
 * @ApiResource(
 *          normalizationContext={"groups":{"niv_exp_glo"}},
 *          denormalizationContext={"groups":{"niv_exp_glo"}},
 *     itemOperations={
 *          "get",
 *          "delete",
 *         "put"={
 *             "denormalization_context"={"groups"={"put"}}
 *         }
 *     }
 * )
 */
class NiveauExperienceGlobal
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
    private $libelleNiveauExperienceGlobal;


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
     * Get the value of libelleNiveauExperienceGlobal
     *
     * @return  string
     */ 
    public function getLibelleNiveauExperienceGlobal()
    {
        return $this->libelleNiveauExperienceGlobal;
    }

    /**
     * Set the value of libelleNiveauExperienceGlobal
     *
     * @param  string  $libelleNiveauExperienceGlobal
     *
     * @return  self
     */ 
    public function setLibelleNiveauExperienceGlobal(string $libelleNiveauExperienceGlobal)
    {
        $this->libelleNiveauExperienceGlobal = $libelleNiveauExperienceGlobal;

        return $this;
    }

    public function __toString()
    {
        return $this->getLibelleNiveauExperienceGlobal();
    }
}