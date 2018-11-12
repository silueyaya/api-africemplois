<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use ApiPlatform\Core\Annotation\ApiProperty;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\File;
use Vich\UploaderBundle\Mapping\Annotation as Vich;
use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Validator\Constraints as Assert;


/**
 * @ApiResource
 * @ORM\Entity(repositoryClass="App\Repository\EntrepriseRepository")
 */
class Entreprise
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
     * @ORM\Column(type="string", length=50, nullable=false)
     * @Groups({"offre"})
     */
    private $raisonSociale;


    /**
     * @var string
     * @Assert\NotBlank(message="Veiller saisir une valeur svp")
     * 
     * @ORM\Column(length=200, nullable=false)
     * @Groups({"offre"})
     */
    private $logo;



    /**
     * @var MediaObject|null
     * @ORM\ManyToOne(targetEntity="App\Entity\MediaObject")
     * @ORM\JoinColumn(nullable=true)
     * @ApiProperty(iri="http://schema.org/image")
     */
    public $image;



    /**
     * @var string
     * @Assert\NotBlank(message="Veiller saisir une valeur svp")
     * 
     * @ORM\Column(type="string", length=50, nullable=false)
     */
    private $email;


    /**
     * @var string
     * @Assert\NotBlank(message="Veiller saisir une valeur svp")
     * 
     * @ORM\Column(type="string", length=11, nullable=false)
     */
    private $telephone;

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
    public function getRaisonSociale(): string
    {
        return $this->raisonSociale;
    }

    /**
     * @param string $raisonSociale
     * @return Entreprise
     */
    public function setRaisonSociale(string $raisonSociale): Entreprise
    {
        $this->raisonSociale = $raisonSociale;
        return $this;
    }

    /**
     * @return string
     */
    public function getLogo(): string
    {
        return $this->logo;
    }

    /**
     * @param string $logo
     * @return Entreprise
     */
    public function setLogo(string $logo): Entreprise
    {
        $this->logo = $logo;
        return $this;
    }

    /**
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * @param string $email
     * @return Entreprise
     */
    public function setEmail(string $email): Entreprise
    {
        $this->email = $email;
        return $this;
    }

    /**
     * @return string
     */
    public function getTelephone(): string
    {
        return $this->telephone;
    }

    /**
     * @param string $telephone
     * @return Entreprise
     */
    public function setTelephone(string $telephone): Entreprise
    {
        $this->telephone = $telephone;
        return $this;
    }


}
