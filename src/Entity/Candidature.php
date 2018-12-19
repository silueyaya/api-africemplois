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
 * @ApiResource(iri="http://schema.org/MediaObject", collectionOperations={
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
     */
    private $id;

    /**
     * @var string
     * @Assert\NotBlank(message="Veiller saisir une valeur svp")
     * @ORM\Column(type="string", length=30, nullable=false)
     *
     */
    private $titreOffre;

    /**
     * @var string
     * @Assert\NotBlank(message="Veiller saisir une valeur svp")
     * @ORM\Column(type="string", length=50, nullable=false)
     */
    private $mailUser;

    /**
     * @var string
     * @Assert\NotBlank(message="Veiller saisir une valeur svp")
     * @ORM\Column(type="string", length=50, nullable=false)
     */
    private $mailEntreprise;

    /**
     * @var File|null
     * @Assert\NotNull()
     * @Vich\UploadableField(mapping="user_cv", fileNameProperty="cvUrl")
     */
    public $file;

    /**
     * @var string|null
     * @ORM\Column(nullable=true)
     * @ApiProperty(iri="http://schema.org/contentUrl")
     */
    public $cvUrl;

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
     * Get the value of cvUrl
     *
     * @return  string|null
     */ 
    public function getCvUrl()
    {
        return $this->cvUrl;
    }
    
    /**
     * Set the value of cvUrl
     *
     * @param  string|null  $cvUrl
     *
     * @return  self
     */ 
    public function setCvUrl($cvUrl)
    {
        $this->cvUrl = $cvUrl;
        
        return $this;
    }

    // public function __toString()
     //{
         //return $this->getLibelleVille();
    // }
}