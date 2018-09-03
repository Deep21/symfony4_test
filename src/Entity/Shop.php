<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ShopRepository")
 */
class Shop
{
    /**
     * @var Collection|Customer[] $customer
     * @ORM\OneToMany(targetEntity=Customer::class, cascade={"persist", "remove"}, mappedBy="shop")
     */
    private $customer;

    /**
     * @var Collection|Shop[] $order
     * @ORM\OneToMany(targetEntity=Shop::class, cascade={"persist", "remove"}, mappedBy="shop")
     */
    private $order;

    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=64)
     */
    private $name;

    /**
     * @ORM\Column(type="boolean")
     */
    private $isActive;

    /**
     * @ORM\Column(type="boolean")
     */
    private $isDeleted;

    /**
     * Shop constructor.
     */
    public function __construct()
    {
        $this->customer = new ArrayCollection();
    }

    /**
     * @return Customer[]|Collection
     */
    public function getCustomer() : Collection
    {
        return $this->customer;
    }

    /**
     * @param Customer $customer
     */
    public function addCustomer(Customer $customer): void
    {
        $this->customer->add($customer);
        $customer->setShop($this);
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getIsActive(): ?bool
    {
        return $this->isActive;
    }

    public function setIsActive(bool $isActive): self
    {
        $this->isActive = $isActive;

        return $this;
    }

    public function getIsDeleted(): ?bool
    {
        return $this->isDeleted;
    }

    public function setIsDeleted(bool $isDeleted): self
    {
        $this->isDeleted = $isDeleted;

        return $this;
    }
}
