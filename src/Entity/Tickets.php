<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;


/**
 * @ORM\Entity(repositoryClass="App\Repository\TicketsRepository")
 */
class Tickets
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    public function getId()
    {
        return $this->id;
    }

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $firstName;

    /**
     * @ORM\Column(type="date")
     */
    private $birthDay;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $specialRate;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $email;

    /**
     * @ORM\Column(type="datetime")
     */
    private $visitDay;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\TycketsType", inversedBy="tickets")
     */
    private $tycketsTypes;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Country", inversedBy="tickets")
     */
    private $countries;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Order", inversedBy="tickets")
     */
    private $order;


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

    public function getBirthDay(): ?\DateTimeInterface
    {
        return $this->birthDay;
    }

    public function setBirthDay(\DateTimeInterface $birthDay): self
    {
        $this->birthDay = $birthDay;

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

    public function getVisitDay(): ?\DateTimeInterface
    {
        return $this->visitDay;
    }

    public function setVisitDay(\DateTimeInterface $visitDay): self
    {
        $this->visitDay = $visitDay;

        return $this;
    }

    public function setCountries(Country $country)
    {
        $this->countries = $country;

        return $this;
    }

    public function getCountries()
    {
        return $this->countries;
    }

    public function setTycketsTypes(TycketsType $tycketsTypes)
    {
        $this->tycketsTypes = $tycketsTypesy;

        return $this;
    }

    public function getTycketsTypes()
    {
        return $this->tycketsTypes;
    }

    public function setOrder(Order $order)
    {
        $this->tycketsTypes = $order;

        return $this;
    }

    public function getOrder()
    {
        return $this->order;
    }

}
