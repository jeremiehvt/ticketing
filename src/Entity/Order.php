<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

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
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $firstname;

    /**
     * @ORM\Column(type="date")
     */
    private $birthday;

    /**
     * @ORM\Column(type="boolean")
     */
    private $country;

    /**
     * @ORM\Column(type="boolean")
     */
    private $type;

    /**
     * @ORM\Column(type="datetime")
     */
    private $visitdays;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $spécialrate;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $email;

    /**
     * @ORM\Column(type="boolean")
     */
    private $numberofplaces;

    public function getId()
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

    public function getFirstname(): ?string
    {
        return $this->firstname;
    }

    public function setFirstname(string $firstname): self
    {
        $this->firstname = $firstname;

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

    public function getCountry(): ?bool
    {
        return $this->country;
    }

    public function setCountry(bool $country): self
    {
        $this->country = $country;

        return $this;
    }

    public function getType(): ?bool
    {
        return $this->type;
    }

    public function setType(bool $type): self
    {
        $this->type = $type;

        return $this;
    }

    public function getVisitdays(): ?\DateTimeInterface
    {
        return $this->visitdays;
    }

    public function setVisitdays(\DateTimeInterface $visitdays): self
    {
        $this->visitdays = $visitdays;

        return $this;
    }

    public function getSpécialrate(): ?bool
    {
        return $this->spécialrate;
    }

    public function setSpécialrate(?bool $spécialrate): self
    {
        $this->spécialrate = $spécialrate;

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

    public function getNumberofplaces(): ?bool
    {
        return $this->numberofplaces;
    }

    public function setNumberofplaces(bool $numberofplaces): self
    {
        $this->numberofplaces = $numberofplaces;

        return $this;
    }
}
