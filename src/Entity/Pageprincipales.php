<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use App\Repository\PageprincipalesRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PageprincipalesRepository::class)]
#[ApiResource()]
class Pageprincipales
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $nom_categorie = null;

    #[ORM\Column(length: 255)]
    private ?string $image_1 = null;

    #[ORM\Column(length: 255)]
    private ?string $image_2 = null;

    #[ORM\Column(length: 255)]
    private ?string $image_3 = null;

    #[ORM\Column(length: 255)]
    private ?string $image_4 = null;


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomCategorie(): ?string
    {
        return $this->nom_categorie;
    }

    public function setNomCategorie(string $nom_categorie): static
    {
        $this->nom_categorie = $nom_categorie;

        return $this;
    }

    public function getImage1(): ?string
    {
        return $this->image_1;
    }

    public function setImage1(string $image_1): static
    {
        $this->image_1 = $image_1;

        return $this;
    }

    public function getImage2(): ?string
    {
        return $this->image_2;
    }

    public function setImage2(string $image_2): static
    {
        $this->image_2 = $image_2;

        return $this;
    }

    public function getImage3(): ?string
    {
        return $this->image_3;
    }

    public function setImage3(string $image_3): static
    {
        $this->image_3 = $image_3;

        return $this;
    }

    public function getImage4(): ?string
    {
        return $this->image_4;
    }

    public function setImage4(string $image_4): static
    {
        $this->image_4 = $image_4;

        return $this;
    }


}
