<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\PlacesRepository")
 */
class Places
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="datetime")
     */
    private $reservationdays;

    /**
     * @ORM\Column(type="integer")
     */
    private $capacity;

    public function getId()
    {
        return $this->id;
    }

    public function getReservationdays(): ?\DateTimeInterface
    {
        return $this->reservationdays;
    }

    public function setReservationdays(\DateTimeInterface $reservationdays): self
    {
        $this->reservationdays = $reservationdays;

        return $this;
    }

    public function getCapacity(): ?int
    {
        return $this->capacity;
    }

    public function setCapacity(int $capacity): self
    {
        $this->capacity = $capacity;

        return $this;
    }
}
