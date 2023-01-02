<?php

namespace App\Entity\Base;

use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

trait TraitEntity
{
    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $date_save = null;

    #[ORM\Column]
    private ?bool $active = null;

    public function getDateSave(): ?\DateTimeInterface
    {
        return $this->date_save;
    }

    public function setDateSave(\DateTimeInterface $date_save): self
    {
        $this->date_save = $date_save;

        return $this;
    }

    public function isActive(): ?bool
    {
        return $this->active;
    }

    public function setActive(bool $active): self
    {
        $this->active = $active;

        return $this;
    }
}