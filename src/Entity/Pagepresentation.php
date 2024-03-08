<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use App\Repository\PagepresentationRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PagepresentationRepository::class)]
#[ApiResource()]
class Pagepresentation
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $nomcategorie = null;

    #[ORM\Column(length: 255)]
    private ?string $taille_g = null;

    #[ORM\Column(length: 255)]
    private ?string $taille_ho = null;

    #[ORM\Column(length: 255)]
    private ?string $taille_n = null;

    #[ORM\Column(length: 255)]
    private ?string $taill_z = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomcategorie(): ?string
    {
        return $this->nomcategorie;
    }

    public function setNomcategorie(string $nomcategorie): static
    {
        $this->nomcategorie = $nomcategorie;

        return $this;
    }

    public function getTailleG(): ?string
    {
        return $this->taille_g;
    }

    public function setTailleG(string $taille_g): static
    {
        $this->taille_g = $taille_g;

        return $this;
    }

    public function getTailleHo(): ?string
    {
        return $this->taille_ho;
    }

    public function setTailleHo(string $taille_ho): static
    {
        $this->taille_ho = $taille_ho;

        return $this;
    }

    public function getTailleN(): ?string
    {
        return $this->taille_n;
    }

    public function setTailleN(string $taille_n): static
    {
        $this->taille_n = $taille_n;

        return $this;
    }

    public function getTaillZ(): ?string
    {
        return $this->taill_z;
    }

    public function setTaillZ(string $taill_z): static
    {
        $this->taill_z = $taill_z;

        return $this;
    }
}
