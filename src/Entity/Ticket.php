<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass="App\Repository\TicketRepository")
 */
class Ticket
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotNull()
     * @Assert\Regex(pattern="/\d/",
     *     match=false,
     *     message="Votre nom ne peut pas contenir de nombre")
     * @Assert\Length(
     *      min = 2,
     *      max = 20,
     *      minMessage = "votre nom doit contenir au moins {{ limit }} charactères",
     *      maxMessage = "votre nom doit contenir moins de {{ limit }} charactères")
     */
    private $name;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotNull()
     * @Assert\Regex(pattern="/\d/",
     *     match=false,
     *     message="Votre prénom ne peut pas contenir de nombre")
     * @Assert\Length(
     *      min = 2,
     *      max = 20,
     *      minMessage = "votre prénom doit contenir au moins {{ limit }} charactères",
     *      maxMessage = "votre prénom doit contenir moins de {{ limit }} charactères")
     */
    private $firstName;

    /**
     * @ORM\Column(type="datetime")
     * @Assert\LessThanOrEqual("today", message="vous ne pouvez commander pour une personne qui est né aujourd'hui ou qui n'est pas encore né")
     * @Assert\DateTime()
     * @Assert\NotNull()
     */
    private $birthday;

    /**
     * @ORM\Column(type="boolean")
     */
    private $reduction = false;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\Country()
     */
    private $country;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Command", inversedBy="tickets")
     * @ORM\JoinColumn(nullable=false)
     */
    private $command;

    /**
     * @ORM\Column(type="integer",nullable=false)
     */
    private $price;


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

    public function getFirstName(): ?string
    {
        return $this->firstName;
    }

    public function setFirstName(string $firstName): self
    {
        $this->firstName = $firstName;

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

    public function getReduction(): ?bool
    {
        return $this->reduction;
    }

    public function setReduction(bool $reduction): self
    {
        $this->reduction = $reduction;

        return $this;
    }

     public function getCountry(): ?string
    {
        return $this->country;
    }

    public function setCountry(string $country): self
    {
        $this->country = $country;

        return $this;
    }

    public function setPrice(int $price): self
    {
        $this->price = $price;

        return $this;
    }

    public function getPrice(): ?int
    {
        return $this->price;
    }

    public function getCommand(): ?Command
    {
        return $this->command;
    }

    public function setCommand(?Command $command): self
    {
        $this->command = $command;

        return $this;
    }
}
