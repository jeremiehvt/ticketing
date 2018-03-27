<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;


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
     * @ORM\ManyToOne(targetEntity="App\Entity\Country", inversedBy="tickets", cascade={"persist"})
     */
    private $countries;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Command", inversedBy="tickets", cascade={"persist"})
     */
    private $command;

    public function __construct()
    {
        $this->countries = new ArrayCollection();
        $this->birthDay = new \DateTime();
        $this->specialRate = 0;
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

    public function getBirthDay(): ?\DateTimeInterface
    {
        return $this->birthDay;
    }

    public function setBirthDay(\DateTimeInterface $birthDay): self
    {
        $this->birthDay = $birthDay;

        return $this;
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

    public function setCommand(Command $command)
    {
        $this->command = $command;

        return $this;
    }

    public function getCommand()
    {
        return $this->command;
    }

    public function addCountries(Country $country)
    {
        $this->countries[] = $country;

        $country->setTickets($this);

        return $this;
    }

    public function removeCountries(Country $country)
    {
        $this->countries->removeElement($country);

        // Et si notre relation était facultative (nullable=true, ce qui n'est pas notre cas ici attention) :        
        // $tickets->setCountries(null);
    }

    public function getCountries()
    {
        return $this->countries;
    }

}
