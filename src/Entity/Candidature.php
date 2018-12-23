<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Serializer\Annotation\Groups;

use ApiPlatform\Core\Annotation\ApiProperty;
use App\Controller\CandidatureAction;
use Symfony\Component\HttpFoundation\File\File;
use Vich\UploaderBundle\Mapping\Annotation as Vich;

/**
 * @ORM\Entity(repositoryClass="App\Repository\CandidatureRepository")
 * @Vich\Uploadable
 * @ApiResource(iri="http://schema.org/MediaObject",
 *          normalizationContext={"groups":{"candida_read"}},
 *          denormalizationContext={"groups":{"candida_write"}},
 *  collectionOperations={
 *     "get",
 *     "post"={
 *         "method"="POST",
 *         "path"="/candidatures",
 *         "controller"=CandidatureAction::class,
 *         "defaults"={"_api_receive"=false},
 *     },
 * })
 */
class Candidature
{
    /**
     * @var int
     *
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @Groups({"candida_read"})
     */
    private $id;

    /**
     * @var string
     * @Assert\NotBlank(message="Veiller saisir une valeur svp")
     * @ORM\Column(type="string", length=30, nullable=false)
     * @Groups({"candida_read","candida_write"})
     */
    private $titreOffre;

    /**
     * @var string
     * @Assert\NotBlank(message="Veiller saisir une valeur svp")
     * @ORM\Column(type="string", length=50, nullable=false)
     * @Groups({"candida_read","candida_write"})
     */
    private $mailUser;

    /**
     * @var string
     * @Assert\NotBlank(message="Veiller saisir une valeur svp")
     * @ORM\Column(type="string", length=50, nullable=false)
     * @Groups({"candida_read","candida_write"})
     */
    private $mailEntreprise;

    /**
     * @var File|null
     * @Assert\NotNull()
     * @Vich\UploadableField(mapping="user_cv", fileNameProperty="cvUrl", size="cvSize")
     * @Groups({"candida_write"})
     */
    public $file;

    /**
     * @var string|null
     * @ORM\Column(nullable=true)
     * @ApiProperty(iri="http://schema.org/contentUrl")
     * @Groups({"candida_read","candida_write"})
     */
    public $cvUrl;

    /**
     * @ORM\Column(type="integer",nullable=true)
     *
     * @var integer
     */
    private $cvSize;

    /**
     * @ORM\Column(type="datetime",nullable=true)
     * @var \DateTime
     */
    private $updatedAt;

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
     * Get the value of titreOffre
     *
     * @return  string
     */ 
    public function getTitreOffre()
    {
        return $this->titreOffre;
    }
    
    /**
     * Set the value of titreOffre
     *
     * @param  string  $titreOffre
     *
     * @return  self
     */ 
    public function setTitreOffre(string $titreOffre)
    {
        $this->titreOffre = $titreOffre;
        
        return $this;
    }
    
    /**
     * Get the value of mailUser
     *
     * @return  string
     */ 
    public function getMailUser()
    {
        return $this->mailUser;
    }
    
    /**
     * Set the value of mailUser
     *
     * @param  string  $mailUser
     *
     * @return  self
     */ 
    public function setMailUser(string $mailUser)
    {
        $this->mailUser = $mailUser;
        
        return $this;
    }
    
    /**
     * Get the value of mailEntreprise
     *
     * @return  string
     */ 
    public function getMailEntreprise()
    {
        return $this->mailEntreprise;
    }
    
    /**
     * Set the value of mailEntreprise
     *
     * @param  string  $mailEntreprise
     *
     * @return  self
     */ 
    public function setMailEntreprise(string $mailEntreprise)
    {
        $this->mailEntreprise = $mailEntreprise;
        
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
    public function setFile(? File $cv = null) : void
    {
        $this->file = $cv;

        if (null !== $cv) {
            // It is required that at least one field changes if you are using doctrine
            // otherwise the event listeners won't be called and the file is lost
            $this->updatedAt = new \DateTimeImmutable();
        }
    }

    public function getFile() : ? File
    {
        return $this->file;
    }

    public function getCvUrl() : ? string
    {
        return $this->cvUrl;
    }

    public function setcvSize(? int $cvSize) : void
    {
        $this->cvSize = $cvSize;
    }

    public function getcvSize() : ? int
    {
        return $this->cvSize;

    }

    // public function __toString()
     //{
         //return $this->getLibelleVille();
    // }
}