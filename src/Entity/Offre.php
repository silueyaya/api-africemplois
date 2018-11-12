<?php

namespace App\Entity;


use ApiPlatform\Core\Annotation\ApiResource;
use ApiPlatform\Core\Annotation\ApiFilter;
use ApiPlatform\Core\Bridge\Doctrine\Orm\Filter\SearchFilter;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Serializer\Annotation\Groups;


/**
 * @ORM\Entity(repositoryClass="App\Repository\OffreRepository")
 * @ApiResource(
 *          normalizationContext={"groups":{"offre"}}
 * )
 * @ApiFilter(SearchFilter::class, properties={"typeContrat": "exact","ville": "exact","entreprise": "exact","secteur": "exact"})
 */
class Offre
{
    /**
     * @var int
     *
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @Groups({"offre"})
     */
    private $id;

    /**
     * @var string
     * @Assert\NotBlank(message="Veiller saisir une valeur svp")
     *
     * @ORM\Column(type="string", length=30, nullable=false)
     *
     * @Groups({"offre"})
     */
    private $titreOffre;


    /**
     *
     * @Assert\NotBlank(message="Veiller saisir une valeur svp")
     *
     * @ORM\Column(type="text", nullable=false)
     * @Groups({"offre"})
     */
    private $descriptionOffre;

    /**
     * @var string
     * @Assert\NotBlank(message="Veiller saisir une valeur svp")
     * @ORM\Column(type="datetime")
     * @Groups({"offre"})
     */
    private $createdAt;


    /**
     * @var string
     * @Assert\NotBlank(message="Veiller saisir une valeur svp")
     * @ORM\Column(type="datetime")
     * @Groups({"offre"})
     */
    private $endingAt;


    /**
     * @var string
     * @Assert\NotBlank(message="Veiller saisir une valeur svp")
     * @ORM\Column(type="boolean")
     * @Groups({"offre"})
     */
    private $statut;


    /**
     * @var string
     * @Assert\NotBlank(message="Veiller saisir une valeur svp")
     * @ORM\Column(type="boolean")
     * @Groups({"offre"})
     */
    private $validation;


    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Ville")
     * @ORM\JoinColumn(nullable=false)
     * @Groups({"offre"})
     */
    private $ville;


    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Entreprise")
     * @ORM\JoinColumn(nullable=false)
     * @Groups({"offre"})
     */
    private $entreprise;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\TypeContrat")
     * @ORM\JoinColumn(nullable=false)
     * @Groups({"offre"})
     */
    private $typeContrat;


    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Secteur")
     * @ORM\JoinColumn(nullable=false)
     * @Groups({"offre"})
     */
    private $secteur;


    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\User")
     * @ORM\JoinColumn(nullable=false)
     * 
     */
    private $user;


    /**
     * @return mixed
     */
    public function getVille()
    {
        return $this->ville;
    }

    /**
     * @param mixed $ville
     * @return Offre
     */
    public function setVille($ville)
    {
        $this->ville = $ville;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getEntreprise()
    {
        return $this->entreprise;
    }

    /**
     * @param mixed $entreprise
     * @return Offre
     */
    public function setEntreprise($entreprise)
    {
        $this->entreprise = $entreprise;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getTypeContrat()
    {
        return $this->typeContrat;
    }

    /**
     * @param mixed $typeContrat
     * @return Offre
     */
    public function setTypeContrat($typeContrat)
    {
        $this->typeContrat = $typeContrat;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getSecteur()
    {
        return $this->secteur;
    }

    /**
     * @param mixed $secteur
     * @return Offre
     */
    public function setSecteur($secteur)
    {
        $this->secteur = $secteur;
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
     * @return Offre
     */
    public function setUser($user)
    {
        $this->user = $user;
        return $this;
    }



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
    public function getTitreOffre(): string
    {
        return $this->titreOffre;
    }

    /**
     * @param string $titreOffre
     * @return Offre
     */
    public function setTitreOffre(string $titreOffre): Offre
    {
        $this->titreOffre = $titreOffre;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getDescriptionOffre()
    {
        return $this->descriptionOffre;
    }

    /**
     * @param mixed $descriptionOffre
     * @return Offre
     */
    public function setDescriptionOffre($descriptionOffre)
    {
        $this->descriptionOffre = $descriptionOffre;
        return $this;
    }

    /**
     *@return string
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * @param string $createdAt
     * @return Offre
     */
    public function setCreatedAt(string $createdAt): Offre
    {
        $this->createdAt = $createdAt;
        return $this;
    }

    /**
     * @return string
     */
    public function getEndingAt()
    {
        return $this->endingAt;
    }

    /**
     * @param string $endingAt
     * @return Offre
     */
    public function setEndingAt(string $endingAt): Offre
    {
        $this->endingAt = $endingAt;
        return $this;
    }

    /**
     * @return string
     */
    public function getStatut(): string
    {
        return $this->statut;
    }

    /**
     * @param string $statut
     * @return Offre
     */
    public function setStatut(string $statut): Offre
    {
        $this->statut = $statut;
        return $this;
    }

    /**
     * @return string
     */
    public function getValidation(): string
    {
        return $this->validation;
    }

    /**
     * @param string $validation
     * @return Offre
     */
    public function setValidation(string $validation): Offre
    {
        $this->validation = $validation;
        return $this;
    }


}