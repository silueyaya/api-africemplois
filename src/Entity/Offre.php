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
 *           attributes={"order"={"id": "DESC"}},
 *          normalizationContext={"groups":{"offre_read"}},
 *          denormalizationContext={"groups":{"offre_write"}},
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
     * @Groups({"offre_read"})
     */
    private $id;

    /**
     * @var string
     * @Assert\NotBlank(message="Veiller saisir une valeur svp")
     * @ORM\Column(type="string", length=30, nullable=false)
     * @Groups({"offre_read","offre_write"})
     */
    private $titreOffre;

    /**
     *
     * @Assert\NotBlank(message="Veiller saisir une valeur svp")
     *
     * @ORM\Column(type="text", nullable=false)
     * @Groups({"offre_read","offre_write"})
     */
    private $descriptionOffre;

    /**
     * @ORM\Column(type="datetime")
     * @Groups({"offre_read","offre_write"})
     */
    private $createdAt;

    /**
     * @ORM\Column(type="datetime")
     * @Groups({"offre_read","offre_write"})
     */
    private $endingAt;

    /**
     * @var boolean
     * @ORM\Column(type="boolean")
     * @Groups({"offre_read","offre_write"})
     */
    private $statut;

    /**
     * @var boolean
     * @ORM\Column(type="boolean")
     * @Groups({"offre_read","offre_write"})
     */
    private $validation;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Ville")
     * @ORM\JoinColumn(nullable=false)
     * @Groups({"offre_read","offre_write"})
     */
    private $ville;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Entreprise")
     * @ORM\JoinColumn(nullable=false)
     * @Groups({"offre_read","offre_write"})
     */
    private $entreprise;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\TypeContrat")
     * @ORM\JoinColumn(nullable=false)
     * @Groups({"offre_read","offre_write"})
     */
    private $typeContrat;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Secteur")
     * @ORM\JoinColumn(nullable=false)
     * @Groups({"offre_read","offre_write"})
     */
    private $secteur;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\User")
     * @ORM\JoinColumn(nullable=false)
     */
    private $user;


    public function getId()
    {
        return $this->id;
    }
    
    
    public function getTitreOffre()
    {
        return $this->titreOffre;
    }
    
    
    public function setTitreOffre(string $titreOffre): Offre
    {
        $this->titreOffre = $titreOffre;
        return $this;
    }
    
    
    public function getDescriptionOffre()
    {
        return $this->descriptionOffre;
    }
    
    public function setDescriptionOffre($descriptionOffre)
    {
        $this->descriptionOffre = $descriptionOffre;
        return $this;
    }
    
    public function getCreatedAt(): ?\DateTimeInterface
    {
        return $this->createdAt;
    }

    public function setCreatedAt(\DateTimeInterface $createdAt): self
    {
        $this->createdAt = $createdAt;

        return $this;
    }
    
    public function getEndingAt() : ? \DateTimeInterface
    {
        return $this->endingAt;
    }
    
    public function setEndingAt(\DateTimeInterface $endingAt) : self
    {
        $this->endingAt = $endingAt;
        return $this;
    }
    
    public function getStatut()
    {
        return $this->statut;
    }
    
    public function setStatut(string $statut)
    {
        $this->statut = $statut;
        return $this;
    }
    
    
    public function getValidation()
    {
        return $this->validation;
    }
    
    public function setValidation(string $validation)
    {
        $this->validation = $validation;
        return $this;
    }
    
    public function getVille()
    {
        return $this->ville;
    }

    public function setVille($ville)
    {
        $this->ville = $ville;
        return $this;
    }

    public function getEntreprise()
    {
        return $this->entreprise;
    }

    public function setEntreprise($entreprise)
    {
        $this->entreprise = $entreprise;
        return $this;
    }

    public function getTypeContrat()
    {
        return $this->typeContrat;
    }

    public function setTypeContrat($typeContrat)
    {
        $this->typeContrat = $typeContrat;
        return $this;
    }

    public function getSecteur()
    {
        return $this->secteur;
    }

    public function setSecteur($secteur)
    {
        $this->secteur = $secteur;
        return $this;
    }

    public function getUser()
    {
        return $this->user;
    }

    public function setUser($user)
    {
        $this->user = $user;
        return $this;
    }
    
}