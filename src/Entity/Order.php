<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;

/**
 * @ORM\Entity(repositoryClass="App\Repository\OrderRepository")
 */
class Order
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     */
    private $numberOfPlaces;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $orderToken;

    /**
    * @ORM\OneToMany(targetEntity="App\Entity\Tickets", mappedBy="order")
    */
    private $tickets;

    public function __construct()
    {
        $this->tickets = new ArrayCollection();
    }

    public function getId()
    {
        return $this->id;
    }

    public function getSpecialRate(): ?bool
    {
        return $this->specialRate;
    }

    public function setSpecialRate(bool $specialRate): self
    {
        $this->specialRate = $specialRate;

        return $this;
    }

    public function getNumberOfPlaces(): ?int
    {
        return $this->numberOfPlaces;
    }

    public function setNumberOfPlaces(int $numberOfPlaces): self
    {
        $this->numberOfPlaces = $numberOfPlaces;

        return $this;
    }

    public function getOrderToken(): ?string
    {
        return $this->orderToken;
    }

    public function setOrderToken(string $orderToken): self
    {
        $this->orderToken = $orderToken;

        return $this;
    }
}
