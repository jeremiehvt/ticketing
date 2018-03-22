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
     * @ORM\Column(type="datetime")
     */
    private $orderDate;

    /**
    * @ORM\OneToMany(targetEntity="App\Entity\Tickets", mappedBy="order")
    */
    private $tickets;

    public function __construct()
    {
        $this->tickets = new ArrayCollection();
        $this->orderDate = new \DateTime();
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

    public function setOrderDate(\DateTimeInterface $orderDate): self
    {
        $this->orderDate = $orderDate;

        return $this;
    }

    public function getOrderDate(): ?\DateTimeInterface
    {
        return $this->orderDate;
    }

    public function addTickets(Tickets $tickets)
    {
        $this->tickets[] = $tickets;

        $tickets->setTycketsTypes($tickets);

        return $this;
    }

    public function removeTickets(Tickets $tickets)
    {
        $this->tickets->removeElement($tickets);
    }

    public function getTickets()
    {
        return $this->tickets;
    }
}
