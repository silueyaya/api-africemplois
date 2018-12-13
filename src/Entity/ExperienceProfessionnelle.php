<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ExperienceProfessionnelleRepository")
 * @ApiResource(
 *          normalizationContext={"groups":{"epx_pro_read"}},
 *          denormalizationContext={"groups":{"epx_pro_write"}},
 *     itemOperations={
 *          "get",
 *          "delete",
 *         "put"={
 *             "denormalization_context"={"groups"={"put"}}
 *         }
 *     }
 * )
 */
class ExperienceProfessionnelle
{
    /**
     * @var int
     *
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @Groups({"epx_pro_read","put","epx_pro_write"})

     */
    private $id;

    /**
     * @Assert\NotBlank(message="Veiller saisir une valeur svp")
     * @ORM\Column(type="datetime")
     * @Groups({"epx_pro_read","put","epx_pro_write"})
     */
    private $dateDebutExp;

    /**
     * @Assert\NotBlank(message="Veiller saisir une valeur svp")
     * @ORM\Column(type="datetime")
     * @Groups({"epx_pro_read","put","epx_pro_write"})
     */
    private $dateFinExp;

    /**
     * @Assert\NotBlank(message="Veiller saisir une valeur svp")
     * @ORM\Column(type="boolean",nullable=true)
     * @Groups({"epx_pro_read","put","epx_pro_write"})
     */
    private $aTodayExp;

    /**
     * @var string
     * @Assert\NotBlank(message="Veiller saisir une valeur svp")
     * @ORM\Column( type="string", length=30, nullable=true)
     * @Groups({"epx_pro_read","put","epx_pro_write"})
     */
    private $titreExp;

    /**
     * @var string
     * @Assert\NotBlank(message="Veiller saisir une valeur svp")
     * @ORM\Column( type="string", length=30, nullable=true)
     * @Groups({"epx_pro_read","put","epx_pro_write"})
     */
    private $entrepriseExp;

    /**
     * @var string
     * @Assert\NotBlank(message="Veiller saisir une valeur svp")
     * @ORM\Column( type="text", length=30, nullable=true)
     * @Groups({"epx_pro_read","put","epx_pro_write"})
     */
    private $descriptionExp;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\User", cascade={"persist"})
     * @ORM\JoinColumn(nullable=true)
     * @Groups({"epx_pro_read","put","epx_pro_write"})
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
     * Get the value of dateDebutExp
     */ 
    public function getDateDebutExp()
    {
        return $this->dateDebutExp;
    }

    /**
     * Set the value of dateDebutExp
     *
     * @return  self
     */ 
    public function setDateDebutExp($dateDebutExp)
    {
        $this->dateDebutExp = $dateDebutExp;

        return $this;
    }

    /**
     * Get the value of dateFinExp
     */ 
    public function getDateFinExp()
    {
        return $this->dateFinExp;
    }

    /**
     * Set the value of dateFinExp
     *
     * @return  self
     */ 
    public function setDateFinExp($dateFinExp)
    {
        $this->dateFinExp = $dateFinExp;

        return $this;
    }

    /**
     * Get the value of aTodayExp
     */ 
    public function getATodayExp()
    {
        return $this->aTodayExp;
    }

    /**
     * Set the value of aTodayExp
     *
     * @return  self
     */ 
    public function setATodayExp($aTodayExp)
    {
        $this->aTodayExp = $aTodayExp;

        return $this;
    }

    /**
     * Get the value of titreExp
     *
     * @return  string
     */ 
    public function getTitreExp()
    {
        return $this->titreExp;
    }

    /**
     * Set the value of titreExp
     *
     * @param  string  $titreExp
     *
     * @return  self
     */ 
    public function setTitreExp(string $titreExp)
    {
        $this->titreExp = $titreExp;

        return $this;
    }

    /**
     * Get the value of entrepriseExp
     *
     * @return  string
     */ 
    public function getEntrepriseExp()
    {
        return $this->entrepriseExp;
    }

    /**
     * Set the value of entrepriseExp
     *
     * @param  string  $entrepriseExp
     *
     * @return  self
     */ 
    public function setEntrepriseExp(string $entrepriseExp)
    {
        $this->entrepriseExp = $entrepriseExp;

        return $this;
    }

    /**
     * Get the value of descriptionExp
     *
     * @return  string
     */ 
    public function getDescriptionExp()
    {
        return $this->descriptionExp;
    }

    /**
     * Set the value of descriptionExp
     *
     * @param  string  $descriptionExp
     *
     * @return  self
     */ 
    public function setDescriptionExp(string $descriptionExp)
    {
        $this->descriptionExp = $descriptionExp;

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
        return $this->getTitreExp();
    }
}