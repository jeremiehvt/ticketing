<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass="App\Repository\CommandRepository")
 * @ORM\HasLifecycleCallbacks()
 */
class Command
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
    private $token;

    /**
     * @ORM\Column(type="datetime")
     */
    private $date;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $email;

    /**
     * @ORM\Column(type="datetime")
     */
    private $visitDay;

    /**
     * @ORM\Column(type="string",length=255, nullable=false)
     */
    private $tycketsType;

    /**
    * @ORM\OneToMany(targetEntity="App\Entity\Ticket", mappedBy="command", cascade={"persist"})
    */
    private $tickets;


    public function getId()
    {
        return $this->id;
    }

    public function __construct()
    {
        $this->tickets = new ArrayCollection();
        $this->date = new \DateTime();
        $this->numberOfPlaces = 1;
        $this->visitDay = new \DateTime();
        $this->billets = new ArrayCollection();
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

    public function getNumberOfPlaces(): ?int
    {
        return $this->numberOfPlaces;
    }

    public function setNumberOfPlaces(int $numberOfPlaces): self
    {
        $this->numberOfPlaces = $numberOfPlaces;

        return $this;
    }

    public function getToken(): ?string
    {
        return $this->token;
    }

    public function setToken(string $token): self
    {

        $this->token = $token;

        return $this;
    }

    public function setDate(\DateTimeInterface $date): self
    {
        $this->date = $date;

        return $this;
    }

    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }

    public function setTycketsType(string $tycketsType): self
    {
        $this->tycketsType = $tycketsType;

        return $this;
    }

    public function getTycketsType(): ?string
    {
        return $this->tycketsType;
    }

    public function addTicket(Ticket $ticket)
    {
        if (!$this->tickets->contains($ticket)) {
            $this->tickets->add($ticket);  
        }
        
        $ticket->setCommand($this);
   
        return $this;
    }

    public function removeTickets(Ticket $ticket)
    {
        $this->tickets->removeElement($ticket);
    }

    public function getTickets()
    {
        return $this->tickets;
    }

    /**
    * @ORM\PrePersist
    */
    public function generateToken()
    {
        $min = 1;
        $max = 10;
        $random = mt_rand($min, $max);
        $bytes = openssl_random_pseudo_bytes($random);
        $hex = bin2hex($bytes);
        $token = str_shuffle($hex . uniqid());

        $this->token = $token;

        return $this;
    }

}
