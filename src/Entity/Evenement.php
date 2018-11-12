<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ApiResource
 * @ORM\Entity(repositoryClass="App\Repository\EvenementRepository")
 */
class Evenement
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
    private $titreEvenement;


    /**
     * @Assert\NotBlank(message="Veiller saisir une valeur svp")
     *
     * @ORM\Column(type="text", nullable=false)
     */
    private $descriptionEvenement;


    /**
     * @var string
     * @Assert\NotBlank(message="Veiller saisir une valeur svp")
     *
     * @ORM\Column(type="datetime")
     */
    private $createdAtEvenement;


    /**
     * @var string
     * @Assert\NotBlank(message="Veiller saisir une valeur svp")
     *
     * @ORM\Column(type="datetime")
     */
    private $endingAtEvenement;


    /**
     * @var string
     * @Assert\NotBlank(message="Veiller saisir une valeur svp")
     *
     * @ORM\Column(type="boolean")
     */
    private $statutEvenement;


    /**
     * @var string
     * @Assert\NotBlank(message="Veiller saisir une valeur svp")
     *
     * @ORM\Column(type="boolean")
     */
    private $validationEvenement;


    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Ville", cascade={"persist"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $ville;


    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\TypeEvenement", cascade={"persist"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $typeEvenement;


    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\User", cascade={"persist"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $user;


    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getTitreEvenement(): string
    {
        return $this->titreEvenement;
    }

    /**
     * @param string $titreEvenement
     * @return Evenement
     */
    public function setTitreEvenement(string $titreEvenement): Evenement
    {
        $this->titreEvenement = $titreEvenement;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getDescriptionEvenement()
    {
        return $this->descriptionEvenement;
    }

    /**
     * @param mixed $descriptionEvenement
     * @return Evenement
     */
    public function setDescriptionEvenement($descriptionEvenement)
    {
        $this->descriptionEvenement = $descriptionEvenement;
        return $this;
    }

    /**
     * @return string
     */
    public function getCreatedAtEvenement()
    {
        return $this->createdAtEvenement;
    }

    /**
     * @param string $createdAtEvenement
     * @return Evenement
     */
    public function setCreatedAtEvenement(string $createdAtEvenement): Evenement
    {
        $this->createdAtEvenement = $createdAtEvenement;
        return $this;
    }

    /**
     * @return string
     */
    public function getEndingAtEvenement()
    {
        return $this->endingAtEvenement;
    }

    /**
     * @param string $endingAtEvenement
     * @return Evenement
     */
    public function setEndingAtEvenement(string $endingAtEvenement): Evenement
    {
        $this->endingAtEvenement = $endingAtEvenement;
        return $this;
    }

    /**
     * @return string
     */
    public function getStatutEvenement(): string
    {
        return $this->statutEvenement;
    }

    /**
     * @param string $statutEvenement
     * @return Evenement
     */
    public function setStatutEvenement(string $statutEvenement): Evenement
    {
        $this->statutEvenement = $statutEvenement;
        return $this;
    }

    /**
     * @return string
     */
    public function getValidationEvenement(): string
    {
        return $this->validationEvenement;
    }

    /**
     * @param string $validationEvenement
     * @return Evenement
     */
    public function setValidationEvenement(string $validationEvenement): Evenement
    {
        $this->validationEvenement = $validationEvenement;
        return $this;
    }


    /**
     * @return mixed
     */
    public function getVille()
    {
        return $this->ville;
    }

    /**
     * @param mixed $ville
     * @return Evenement
     */
    public function setVille($ville)
    {
        $this->ville = $ville;
        return $this;
    }


    /**
     * @return mixed
     */
    public function getTypeEvenement()
    {
        return $this->typeEvenement;
    }

    /**
     * @param mixed $typeEvenement
     * @return Evenement
     */
    public function setTypeEvenement($typeEvenement)
    {
        $this->typeEvenement = $typeEvenement;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * @param mixed $user
     * @return Evenement
     */
    public function setUser($user)
    {
        $this->user = $user;
        return $this;
    }


}