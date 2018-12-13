<?php
namespace App\Entity;



use ApiPlatform\Core\Annotation\ApiResource;
use ApiPlatform\Core\Annotation\ApiFilter;
use ApiPlatform\Core\Bridge\Doctrine\Orm\Filter\SearchFilter;

use Doctrine\ORM\Mapping as ORM;
use FOS\UserBundle\Model\User as BaseUser;
use FOS\UserBundle\Model\UserInterface;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ORM\Entity
 * @ORM\Table(name="user")
 * @ApiResource(
 *     normalizationContext={"groups"={"user", "user:read"}},
 *     denormalizationContext={"groups"={"user", "user:write"}},
 *     itemOperations={
 *          "get",
 *          "delete",
 *         "put"={
 *             "denormalization_context"={"groups"={"put"}}
 *         }
 *     }
 * )
 * 
 * @ApiFilter(SearchFilter::class, properties={"email": "exact","username": "exact"})
 */
class User extends BaseUser
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     * @Groups({"user:read"})
     */
    protected $id;

    /**
     * @Groups({"user:write","user:read",})
     */
    protected $email;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Groups({"put"})
     */
    protected $fullname;

    /**
     * @ORM\Column(type="string", length=15, nullable=true)
     * @Groups({"user:write","user:read","put"})
     */
    protected $nom;

    /**
     * @ORM\Column(type="string", length=40, nullable=true)
     * @Groups({"user:write","user:read","put"})
     */
    protected $prenom;



    /**
     * @Groups({"user:write"})
     */
    protected $plainPassword;

    /**
     * @Groups({"user:write"})
     */
    protected $username;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\NiveauEtude", cascade={"persist"})
     * @ORM\JoinColumn(nullable=true)
     * @Groups({"put"})
     */
    private $niveauEtude;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\NiveauExperienceGlobal", cascade={"persist"})
     * @ORM\JoinColumn(nullable=true)
     * @Groups({"put"})
     */
    private $niveauExperienceGlobal;

    /**
     * Get the value of id
     */
    public function getId()
    {
        return $this->id;
    }

    public function setFullname(? string $fullname) : void
    {
        $this->fullname = $fullname;
    }

    public function getFullname() : ? string
    {
        return $this->fullname;
    }

    public function isUser(? UserInterface $user = null) : bool
    {
        return $user instanceof self && $user->id === $this->id;
    }

    public function setPrenom($prenom)
    {
        $this->prenom = $prenom;
    }

    public function getPrenom()
    {
        return $this->prenom;
    }


    /**
     * Get the value of niveauEtude
     */
    public function getNiveauEtude()
    {
        return $this->niveauEtude;
    }

    /**
     * Set the value of niveauEtude
     *
     * @return  self
     */
    public function setNiveauEtude($niveauEtude)
    {
        $this->niveauEtude = $niveauEtude;

        return $this;
    }

    /**
     * Get the value of niveauExperienceGlobal
     */
    public function getNiveauExperienceGlobal()
    {
        return $this->niveauExperienceGlobal;
    }

    /**
     * Set the value of niveauExperienceGlobal
     *
     * @return  self
     */
    public function setNiveauExperienceGlobal($niveauExperienceGlobal)
    {
        $this->niveauExperienceGlobal = $niveauExperienceGlobal;

        return $this;
    }

    /**
     * Get the value of nom
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * Set the value of nom
     *
     * @return  self
     */
    public function setNom($nom)
    {
        $this->nom = $nom;

        return $this;
    }


}