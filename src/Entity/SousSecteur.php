<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Serializer\Annotation\Groups;


/**
 * @ORM\Entity(repositoryClass="App\Repository\SousSecteurRepository")
 * @ApiResource(
 *          normalizationContext={"groups":{"sous_secteur"}},
 *          denormalizationContext={"groups":{"sous_secteur"}},
 * 
 * )
 */
class SousSecteur
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
     * @ORM\Column(type="string", length=30, nullable=false)
     * @Groups({"sous_secteur"})
     */
    private $libelleSousSecteur;


    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Secteur")
     * @ORM\JoinColumn(nullable=false)
     * @Groups({"sous_secteur"})
     */
    private $secteur;


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
    public function getLibelleSousSecteur(): string
    {
        return $this->libelleSousSecteur;
    }

    /**
     * @param string $libelleSousSecteur
     * @return SousSecteur
     */
    public function setLibelleSousSecteur(string $libelleSousSecteur): SousSecteur
    {
        $this->libelleSousSecteur = $libelleSousSecteur;
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
     * @return SousSecteur
     */
    public function setSecteur($secteur)
    {
        $this->secteur = $secteur;
        return $this;
    }

}
