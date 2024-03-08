<?php

namespace App\Entity;

use App\Repository\PaiementRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PaiementRepository::class)]
class Paiement
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?int $Numero_carte = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $date_fin = null;

    #[ORM\Column(length: 255)]
    private ?string $Nom_carte = null;

    #[ORM\Column]
    private ?int $numero_secu = null;

    #[ORM\ManyToOne(inversedBy: 'moyenpaiement')]
    private ?Utilisateur $utilisateur = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNumeroCarte(): ?int
    {
        return $this->Numero_carte;
    }

    public function setNumeroCarte(int $Numero_carte): static
    {
        $this->Numero_carte = $Numero_carte;

        return $this;
    }

    public function getDateFin(): ?\DateTimeInterface
    {
        return $this->date_fin;
    }

    public function setDateFin(\DateTimeInterface $date_fin): static
    {
        $this->date_fin = $date_fin;

        return $this;
    }

    public function getNomCarte(): ?string
    {
        return $this->Nom_carte;
    }

    public function setNomCarte(string $Nom_carte): static
    {
        $this->Nom_carte = $Nom_carte;

        return $this;
    }

    public function getNumeroSecu(): ?int
    {
        return $this->numero_secu;
    }

    public function setNumeroSecu(int $numero_secu): static
    {
        $this->numero_secu = $numero_secu;

        return $this;
    }

    public function getUtilisateur(): ?Utilisateur
    {
        return $this->utilisateur;
    }

    public function setUtilisateur(?Utilisateur $utilisateur): static
    {
        $this->utilisateur = $utilisateur;

        return $this;
    }
}
