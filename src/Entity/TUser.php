<?php

namespace App\Entity;

use App\Entity\Base\TraitEntity;
use App\Repository\TUserRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

#[ORM\Entity(repositoryClass: TUserRepository::class)]
#[UniqueEntity(fields: "username", message: "username alredy used")]
class TUser
{
    use TraitEntity;
    
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $username = null;

    #[ORM\Column(length: 255)]
    private ?string $firstname = null;

    #[ORM\Column(length: 255)]
    private ?string $lastname = null;

    #[ORM\Column(type: Types::DATE_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $naissance = null;

    #[ORM\ManyToOne(inversedBy: 'tUsers')]
    private ?TPays $fk_pays = null;

    #[ORM\OneToMany(mappedBy: 'fk_user', targetEntity: TArticle::class)]
    private Collection $tArticles;

    #[ORM\OneToMany(mappedBy: 'fk_user', targetEntity: TComment::class)]
    private Collection $tComments;

    public function __construct()
    {
        $this->tArticles = new ArrayCollection();
        $this->tComments = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUsername(): ?string
    {
        return $this->username;
    }

    public function setUsername(string $username): self
    {
        $this->username = $username;

        return $this;
    }

    public function getFirstname(): ?string
    {
        return $this->firstname;
    }

    public function setFirstname(string $firstname): self
    {
        $this->firstname = $firstname;

        return $this;
    }

    public function getLastname(): ?string
    {
        return $this->lastname;
    }

    public function setLastname(string $lastname): self
    {
        $this->lastname = $lastname;

        return $this;
    }

    public function getNaissance(): ?\DateTimeInterface
    {
        return $this->naissance;
    }

    public function setNaissance(?\DateTimeInterface $naissance): self
    {
        $this->naissance = $naissance;

        return $this;
    }

    public function getFkPays(): ?TPays
    {
        return $this->fk_pays;
    }

    public function setFkPays(?TPays $fk_pays): self
    {
        $this->fk_pays = $fk_pays;

        return $this;
    }

    /**
     * @return Collection<int, TArticle>
     */
    public function getTArticles(): Collection
    {
        return $this->tArticles;
    }

    public function addTArticle(TArticle $tArticle): self
    {
        if (!$this->tArticles->contains($tArticle)) {
            $this->tArticles->add($tArticle);
            $tArticle->setFkUser($this);
        }

        return $this;
    }

    public function removeTArticle(TArticle $tArticle): self
    {
        if ($this->tArticles->removeElement($tArticle)) {
            // set the owning side to null (unless already changed)
            if ($tArticle->getFkUser() === $this) {
                $tArticle->setFkUser(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, TComment>
     */
    public function getTComments(): Collection
    {
        return $this->tComments;
    }

    public function addTComment(TComment $tComment): self
    {
        if (!$this->tComments->contains($tComment)) {
            $this->tComments->add($tComment);
            $tComment->setFkUser($this);
        }

        return $this;
    }

    public function removeTComment(TComment $tComment): self
    {
        if ($this->tComments->removeElement($tComment)) {
            // set the owning side to null (unless already changed)
            if ($tComment->getFkUser() === $this) {
                $tComment->setFkUser(null);
            }
        }

        return $this;
    }
}
