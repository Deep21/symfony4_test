<?php

namespace App\Entity;

use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\CartRepository")
 */
class Cart
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @var Collection|Shop[] $order
     * @ORM\OneToMany(targetEntity=Order::class, cascade={"persist", "remove"}, mappedBy="cart")
     */
    private $order;

    /**
     * @ORM\Column(type="boolean")
     */
    private $gift;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getGift(): ?bool
    {
        return $this->gift;
    }

    public function setGift(bool $gift): self
    {
        $this->gift = $gift;

        return $this;
    }
}
