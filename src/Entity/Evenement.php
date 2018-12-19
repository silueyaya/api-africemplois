<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ORM\Entity(repositoryClass="App\Repository\EvenementRepository")
 * @ApiResource(
 *          normalizationContext={"groups":{"event_read"}},
 *          denormalizationContext={"groups":{"event_write"}},
 * )
 */
class Evenement
{
    /**
     * @var int
     *
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @Groups({"event_read"})
     */
    private $id;

    /**
     * @var string
     * @Assert\NotBlank(message="Veiller saisir une valeur svp")
     * @ORM\Column(type="string", length=30, nullable=false)
     * @Groups({"event_read","event_write"})
     */
    private $titreEvenement;


    /**
     * @Assert\NotBlank(message="Veiller saisir une valeur svp")
     * @ORM\Column(type="text", nullable=false)
     * @Groups({"event_read","event_write"})
     */
    private $descriptionEvenement;


    /**
     * @Assert\NotBlank(message="Veiller saisir une valeur svp")
     * @ORM\Column(type="datetime")
     * @Groups({"event_read","event_write"})
     */
    private $createdAtEvenement;


    /**
     * @Assert\NotBlank(message="Veiller saisir une valeur svp")
     * @ORM\Column(type="datetime")
     * @Groups({"event_read","event_write"})
     */
    private $endingAtEvenement;


    /**
     * @var boolean
     * @ORM\Column(type="boolean")
     * @Groups({"event_read","event_write"})
     */
    private $statutEvenement;


    /**
     * @var boolean
     * @ORM\Column(type="boolean")
     * @Groups({"event_read","event_write"})
     */
    private $validationEvenement;


    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Ville", cascade={"persist"})
     * @ORM\JoinColumn(nullable=false)
     * @Groups({"event_read","event_write"})
     */
    private $ville;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Entreprise")
     * @ORM\JoinColumn(nullable=false)
     * @Groups({"event_read","event_write"})
     */
    private $entreprise;


    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\TypeEvenement", cascade={"persist"})
     * @ORM\JoinColumn(nullable=false)
     * @Groups({"event_read","event_write"})
     */
    private $typeEvenement;


    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\User", cascade={"persist"})
     * @ORM\JoinColumn(nullable=false)
     * @Groups({"event_read","event_write"})
     */
    private $user;


    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getTitreEvenement()
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



    public function getCreatedAtEvenement() : ? \DateTimeInterface
    {
        return $this->createdAtEvenement;
    }

    public function setCreatedAtEvenement(\DateTimeInterface $createdAtEvenement) : self
    {
        $this->createdAtEvenement = $createdAtEvenement;

        return $this;
    }

    public function getEndingAtEvenement() : ? \DateTimeInterface
    {
        return $this->endingAtEvenement;
    }

    public function setEndingAtEvenement(\DateTimeInterface $endingAtEvenement) : self
    {
        $this->endingAtEvenement = $endingAtEvenement;
        return $this;
    }

    

    public function getStatutEvenement()
    {
        return $this->statutEvenement;
    }


    public function setStatutEvenement($statutEvenement)
    {
        $this->statutEvenement = $statutEvenement;
        return $this;
    }


    public function getValidationEvenement()
    {
        return $this->validationEvenement;
    }


    public function setValidationEvenement($validationEvenement)
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


    public function getEntreprise()
    {
        return $this->entreprise;
    }


    public function setEntreprise($entreprise)
    {
        $this->entreprise = $entreprise;
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