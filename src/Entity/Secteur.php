<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Validator\Constraints as Assert;


/**
 * @ApiResource()
 * @ORM\Entity(repositoryClass="App\Repository\SecteurRepository")
 */
class Secteur
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
     * @Groups({"sous_secteur","offre"})
     */
    private $libelleSecteur;


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
    public function getLibelleSecteur(): string
    {
        return $this->libelleSecteur;
    }

    /**
     * @param string $libelleSecteur
     * @return Secteur
     */
    public function setLibelleSecteur(string $libelleSecteur): Secteur
    {
        $this->libelleSecteur = $libelleSecteur;
        return $this;
    }



}
