<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use App\Repository\ProduitsRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ProduitsRepository::class)]
#[ApiResource()]
class Produits
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $prix = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $detail = null;

    #[ORM\Column(length: 100)]
    private ?string $nom = null;

    #[ORM\Column(length: 255)]
    private ?string $vue1 = null;

    #[ORM\Column(length: 255)]
    private ?string $vue2 = null;

    #[ORM\Column(length: 255)]
    private ?string $vue3 = null;

    #[ORM\Column(length: 255)]
    private ?string $vue4 = null;

    #[ORM\Column(length: 255)]
    private ?string $vue5 = null;

    #[ORM\Column(length: 255)]
    private ?string $nom_categorie = null;


    #[ORM\OneToMany(targetEntity: OrdersDetails::class, mappedBy: 'produit')]
    private Collection $ordersDetails;

    #[ORM\Column(type: Types::SMALLINT)]
    private ?int $quantite = null;

    public function __construct()
    {
        $this->ordersDetails = new ArrayCollection();
    }

    // #[ORM\OneToMany(targetEntity: OrderDetails::class, mappedBy: 'produit', orphanRemoval: true)]
    // private Collection $orderDetails;

    // public function __construct()
    // {
    //     $this->orderDetails = new ArrayCollection();
    // }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPrix(): ?string
    {
        return $this->prix;
    }

    public function setPrix(?string $prix): static
    {
        $this->prix = $prix;

        return $this;
    }

    public function getDetail(): ?string
    {
        return $this->detail;
    }

    public function setDetail(string $detail): static
    {
        $this->detail = $detail;

        return $this;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): static
    {
        $this->nom = $nom;

        return $this;
    }


    public function getVue1(): ?string
    {
        return $this->vue1;
    }

    public function setVue1(string $vue1): static
    {
        $this->vue1 = $vue1;

        return $this;
    }

    public function getVue2(): ?string
    {
        return $this->vue2;
    }

    public function setVue2(string $vue2): static
    {
        $this->vue2 = $vue2;

        return $this;
    }

    public function getVue3(): ?string
    {
        return $this->vue3;
    }

    public function setVue3(string $vue3): static
    {
        $this->vue3 = $vue3;

        return $this;
    }

    public function getVue4(): ?string
    {
        return $this->vue4;
    }

    public function setVue4(string $vue4): static
    {
        $this->vue4 = $vue4;

        return $this;
    }

    public function getVue5(): ?string
    {
        return $this->vue5;
    }

    public function setVue5(string $vue5): static
    {
        $this->vue5 = $vue5;

        return $this;
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

    // /**
    //  * @return Collection<int, OrderDetails>
    //  */
    // public function getOrderDetails(): Collection
    // {
    //     return $this->orderDetails;
    // }

    // public function addOrderDetail(OrderDetails $orderDetail): static
    // {
    //     if (!$this->orderDetails->contains($orderDetail)) {
    //         $this->orderDetails->add($orderDetail);
    //         $orderDetail->setProduit($this);
    //     }

    //     return $this;
    // }

    // public function removeOrderDetail(OrderDetails $orderDetail): static
    // {
    //     if ($this->orderDetails->removeElement($orderDetail)) {
    //         // set the owning side to null (unless already changed)
    //         if ($orderDetail->getProduit() === $this) {
    //             $orderDetail->setProduit(null);
    //         }
    //     }

    //     return $this;
    // }

    /**
     * @return Collection<int, OrdersDetails>
     */
    public function getOrdersDetails(): Collection
    {
        return $this->ordersDetails;
    }

    public function addOrdersDetail(OrdersDetails $ordersDetail): static
    {
        if (!$this->ordersDetails->contains($ordersDetail)) {
            $this->ordersDetails->add($ordersDetail);
            $ordersDetail->setProduit($this);
        }

        return $this;
    }

    public function removeOrdersDetail(OrdersDetails $ordersDetail): static
    {
        if ($this->ordersDetails->removeElement($ordersDetail)) {
            // set the owning side to null (unless already changed)
            if ($ordersDetail->getProduit() === $this) {
                $ordersDetail->setProduit(null);
            }
        }

        return $this;
    }

    public function getQuantite(): ?int
    {
        return $this->quantite;
    }

    public function setQuantite(int $quantite): static
    {
        $this->quantite = $quantite;

        return $this;
    }
}
