<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use ApiPlatform\Core\Annotation\ApiProperty;
use Doctrine\ORM\Mapping as ORM;

use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Validator\Constraints as Assert;

use Symfony\Component\HttpFoundation\File\File;
use Vich\UploaderBundle\Mapping\Annotation as Vich;

/**
 * @ApiResource()
 * @Vich\Uploadable
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
     * @Groups({"offre_read"})
     */
    private $raisonSociale;


    /**
     * @var string
     * @Assert\NotBlank(message="Veiller saisir une valeur svp")
     * 
     * @ORM\Column(length=200, nullable=false)
     * @Groups({"offre_read"})
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
     * NOTE: This is not a mapped field of entity metadata, just a simple property.
     * 
     * @Vich\UploadableField(mapping="piece_image", fileNameProperty="imageName", size="imageSize")
     * 
     * @var File
     */
    private $imageFile;

    /**
     * @ORM\Column(type="string", length=255)
     *
     * @var string
     * @Groups({"offre_read"})
     */
    private $imageName;

    /**
     * @ORM\Column(type="integer",nullable=true)
     *
     * @var integer
     */
    private $imageSize;



    /**
     * @var string
     * @Assert\NotBlank(message="Veiller saisir une valeur svp")
     * @ORM\Column(type="string", length=50, nullable=false)
     * @Groups({"offre_read"})
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
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getRaisonSociale()
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
    public function getLogo()
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
    public function getEmail()
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
    public function getTelephone()
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

    /**
     * If manually uploading a file (i.e. not using Symfony Form) ensure an instance
     * of 'UploadedFile' is injected into this setter to trigger the update. If this
     * bundle's configuration parameter 'inject_on_load' is set to 'true' this setter
     * must be able to accept an instance of 'File' as the bundle will inject one here
     * during Doctrine hydration.
     *
     * @param File|\Symfony\Component\HttpFoundation\File\UploadedFile $image
     */
    public function setImageFile(? File $image = null) : void
    {
        $this->imageFile = $image;

        if (null !== $image) {
            // It is required that at least one field changes if you are using doctrine
            // otherwise the event listeners won't be called and the file is lost
            $this->updatedAt = new \DateTimeImmutable();
        }
    }

    public function getImageFile() : ? File
    {
        return $this->imageFile;
    }

    public function setImageName(? string $imageName) : void
    {
        $this->imageName = $imageName;
    }

    public function getImageName() : ? string
    {
        return $this->imageName;
    }

    public function setImageSize(? int $imageSize) : void
    {
        $this->imageSize = $imageSize;
    }

    public function getImageSize() : ? int
    {
        return $this->imageSize;
    }


    public function __toString()
    {
        return $this->getRaisonSociale();
        //return trim($this->getImageName() . '    ' . $this->getRaisonSociale());

    }

}
