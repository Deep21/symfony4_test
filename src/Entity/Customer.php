<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Customer
 *
 * @ORM\Table(name="customer")
 * @ORM\Entity(repositoryClass="App\Repository\CustomerRepository")
 */
class Customer
{
    /**
     * @var Collection|Address[] $address
     * @ORM\OneToMany(targetEntity=Address::class, cascade={"persist", "remove"}, mappedBy="customer")
     */
    private $address;

    /**
     * @var Collection|Order[] $order
     * @ORM\OneToMany(targetEntity=Order::class, cascade={"persist", "remove"}, mappedBy="customer")
     */
    private $order;

    /**
     * @ORM\ManyToOne(targetEntity=ShopGroup::class, inversedBy="customer")
     */
    private $shopgroup;

    /**
     * @ORM\ManyToOne(targetEntity=Shop::class, inversedBy="customer")
     */
    private $shop;

    /**
     * @return ShopGroup
     */
    public function getShopGroup(): ShopGroup
    {
        return $this->shopgroup;
    }

    /**
     * @param ShopGroup $shopgroup
     */
    public function setShopGroup(ShopGroup $shopgroup): void
    {
        $this->shopgroup = $shopgroup;
    }

    /**
     * @param Shop $shop
     */
    public function setShop(Shop $shop): void
    {
        $this->shop = $shop;
    }

    /**
     * @return Shop
     */
    public function getShop(): Shop
    {
        return $this->shop;
    }

    /**
     * @var int
     *
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer", nullable=false, options={"unsigned"=true})
     */
    private $id;

    /**
     * @var string|null
     *
     * @ORM\Column(name="company", type="string", length=64, nullable=true)
     */
    private $company;

    /**
     * @var string|null
     *
     * @ORM\Column(name="siret", type="string", length=14, nullable=true)
     */
    private $siret;

    /**
     * @var string|null
     *
     * @ORM\Column(name="ape", type="string", length=5, nullable=true)
     */
    private $ape;

    /**
     * @var string
     *
     * @ORM\Column(name="firstname", type="string", length=255, nullable=false)
     */
    private $firstname;

    /**
     * @var string
     *
     * @ORM\Column(name="lastname", type="string", length=255, nullable=false)
     */
    private $lastname;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=128, nullable=false)
     */
    private $email;

    /**
     * @ORM\Column(type="datetime")
     */
    private $created_at;

    /**
     * @ORM\Column(type="datetime")
     */
    private $updated_at;

    /**
     * @ORM\Column(type="boolean")
     */
    private $is_active;

    /**
     * @ORM\Column(type="boolean")
     */
    private $is_deleted;

    /**
     * @ORM\Column(type="datetime")
     */
    private $birthday;

    /**
     * Customer constructor.
     */
    public function __construct()
    {
        $this->address = new ArrayCollection();
    }

    public function getCompany(): ?string
    {
        return $this->company;
    }

    public function setCompany(?string $company): self
    {
        $this->company = $company;

        return $this;
    }

    public function getSiret(): ?string
    {
        return $this->siret;
    }

    public function setSiret(?string $siret): self
    {
        $this->siret = $siret;

        return $this;
    }

    public function getApe(): ?string
    {
        return $this->ape;
    }

    public function setApe(?string $ape): self
    {
        $this->ape = $ape;

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

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId(int $id): void
    {
        $this->id = $id;
    }

    /**
     * @return Address[]|Collection
     */
    public function getAddress() : Collection
    {
        return $this->address;
    }

    /**
     * @param Address $address
     */
    public function addAddress(Address $address): void
    {
        $this->address->add($address);
        $address->setCustomer($this);
    }

    /**
     * @return Address[]|Collection
     */
    public function getOrder() : Collection
    {
        return $this->order;
    }

    /**
     * @param Order $order
     */
    public function addOrder(Order $order): void
    {
        $this->order->add($order);
        $order->setCustomer($this);
    }

    public function getCreatedAt(): ?\DateTimeInterface
    {
        return $this->created_at;
    }

    public function setCreatedAt(\DateTimeInterface $created_at): self
    {
        $this->created_at = $created_at;

        return $this;
    }

    public function getUpdatedAt(): ?\DateTimeInterface
    {
        return $this->updated_at;
    }

    public function setUpdatedAt(\DateTimeInterface $updated_at): self
    {
        $this->updated_at = $updated_at;

        return $this;
    }

    public function getIsActive(): ?bool
    {
        return $this->is_active;
    }

    public function setIsActive(bool $is_active): self
    {
        $this->is_active = $is_active;

        return $this;
    }

    public function getIsDeleted(): ?bool
    {
        return $this->is_deleted;
    }

    public function setIsDeleted(bool $is_deleted): self
    {
        $this->is_deleted = $is_deleted;

        return $this;
    }

    public function getBirthday(): ?\DateTimeInterface
    {
        return $this->birthday;
    }

    public function setBirthday(\DateTimeInterface $birthday): self
    {
        $this->birthday = $birthday;

        return $this;
    }


}