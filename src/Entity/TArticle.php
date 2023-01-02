<?php

namespace App\Entity;

use App\Entity\Base\TraitEntity;
use App\Repository\TArticleRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: TArticleRepository::class)]
class TArticle
{

    use TraitEntity;

    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $title = null;

    #[ORM\Column(length: 3000)]
    private ?string $description = null;

    #[ORM\ManyToOne(inversedBy: 'tArticles')]
    private ?TUser $fk_user = null;

    #[ORM\OneToMany(mappedBy: 'fk_article', targetEntity: TComment::class)]
    private Collection $tComments;


    public function __construct()
    {
        $this->tComments = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getFkUser(): ?TUser
    {
        return $this->fk_user;
    }

    public function setFkUser(?TUser $fk_user): self
    {
        $this->fk_user = $fk_user;

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
            $tComment->setFkArticle($this);
        }

        return $this;
    }

    public function removeTComment(TComment $tComment): self
    {
        if ($this->tComments->removeElement($tComment)) {
            // set the owning side to null (unless already changed)
            if ($tComment->getFkArticle() === $this) {
                $tComment->setFkArticle(null);
            }
        }

        return $this;
    }
}
