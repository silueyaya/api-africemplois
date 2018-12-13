<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ORM\Entity(repositoryClass="App\Repository\FormationRepository")
 * @ApiResource(
 *          normalizationContext={"groups":{"forma_read"}},
 *          denormalizationContext={"groups":{"forma_write"}},
 *     itemOperations={
 *          "get",
 *          "delete",
 *         "put"={
 *             "denormalization_context"={"groups"={"put"}}
 *         }
 *     }
 * )
 */
class Formation
{
    /**
     * @var int
     *
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @Groups({"forma_read","put","forma_write"})
     */
    private $id;

    /**
     * @Assert\NotBlank(message="Veiller saisir une valeur svp")
     * @ORM\Column(type="datetime")
     * @Groups({"forma_read","put","forma_write"})
     */
    private $dateDebut;

    /**
     * @Assert\NotBlank(message="Veiller saisir une valeur svp")
     * @ORM\Column(type="datetime")
     * @Groups({"forma_read","put","forma_write"})
     */
    private $dateFin;

    /**
     * @Assert\NotBlank(message="Veiller saisir une valeur svp")
     * @ORM\Column(type="boolean",nullable=true)
     * @Groups({"forma_read","put","forma_write"})
     */
    private $aToday;

    /**
     * @var string
     * @Assert\NotBlank(message="Veiller saisir une valeur svp")
     * @ORM\Column( type="string", length=30, nullable=true)
     * @Groups({"forma_read","put","forma_write"})
     */
    private $titre;

    /**
     * @var string
     * @Assert\NotBlank(message="Veiller saisir une valeur svp")
     * @ORM\Column( type="string", length=30, nullable=true)
     * @Groups({"forma_read","put","forma_write"})
     */
    private $etablissement;

    /**
     * @var string
     * @Assert\NotBlank(message="Veiller saisir une valeur svp")
     * @ORM\Column( type="text", length=30, nullable=true)
     * @Groups({"forma_read","put","forma_write"})
     */
    private $description;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\User", cascade={"persist"})
     * @ORM\JoinColumn(nullable=true)
     * @Groups({"forma_read","put","forma_write"})
     */
    private $user;

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
     * Get the value of dateDebut
     */ 
    public function getDateDebut()
    {
        return $this->dateDebut;
    }

    /**
     * Set the value of dateDebut
     *
     * @return  self
     */ 
    public function setDateDebut($dateDebut)
    {
        $this->dateDebut = $dateDebut;

        return $this;
    }

    /**
     * Get the value of dateFin
     */ 
    public function getDateFin()
    {
        return $this->dateFin;
    }

    /**
     * Set the value of dateFin
     *
     * @return  self
     */ 
    public function setDateFin($dateFin)
    {
        $this->dateFin = $dateFin;

        return $this;
    }

    /**
     * Get the value of aToday
     */ 
    public function getAToday()
    {
        return $this->aToday;
    }

    /**
     * Set the value of aToday
     *
     * @return  self
     */ 
    public function setAToday($aToday)
    {
        $this->aToday = $aToday;

        return $this;
    }

    /**
     * Get the value of titre
     *
     * @return  string
     */ 
    public function getTitre()
    {
        return $this->titre;
    }

    /**
     * Set the value of titre
     *
     * @param  string  $titre
     *
     * @return  self
     */ 
    public function setTitre(string $titre)
    {
        $this->titre = $titre;

        return $this;
    }

    /**
     * Get the value of etablissement
     *
     * @return  string
     */ 
    public function getEtablissement()
    {
        return $this->etablissement;
    }

    /**
     * Set the value of etablissement
     *
     * @param  string  $etablissement
     *
     * @return  self
     */ 
    public function setEtablissement(string $etablissement)
    {
        $this->etablissement = $etablissement;

        return $this;
    }

    /**
     * Get the value of description
     *
     * @return  string
     */ 
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set the value of description
     *
     * @param  string  $description
     *
     * @return  self
     */ 
    public function setDescription(string $description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get the value of user
     */ 
    public function getUser()
    {
        return $this->user;
    }
    
    /**
     * Set the value of user
     *
     * @return  self
     */ 
    public function setUser($user)
    {
        $this->user = $user;
        
        return $this;
    }

    public function __toString()
    {
        return $this->getTitre();
    }
}