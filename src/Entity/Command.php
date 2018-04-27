<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Validator\Context\ExecutionContextInterface;
use App\Validator as AcmeAssert;

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
    private $commandDate;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\Email(message= "{{ Value }} n'est pas un email valide", checkMX=true, checkHost=true)
     * @Assert\NotNull()
     */
    private $email;

    /**
     * @ORM\Column(type="datetime")
     * @Assert\GreaterThanOrEqual("today", message="impossible de commander pour un jour passé")
     * @AcmeAssert\DateCounter
     * @Assert\DateTime()
     * @Assert\NotNull()
     */
    private $visitDay;

    /**
     * @ORM\Column(type="string",length=255, nullable=false)
     * @Assert\NotNull()
     */
    private $tycketsType;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Ticket", mappedBy="command", cascade={"persist"})
     * @Assert\Valid
     */
    private $tickets;

    /**
     * @ORM\Column(type="integer", nullable=false)
     */
    private $price;

    /**
     * @ORM\Column(type="boolean")
     */
    private $paid;


    public function getId()
    {
        return $this->id;
    }

    public function __construct()
    {
        $this->tickets = new ArrayCollection();
        $this->commandDate = new \DateTime();
        
        $this->paid = false;       
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

    public function setCommandDate(\DateTimeInterface $ommandDate): self
    {
        $this->ommandDate = $ommandDate;

        return $this;
    }

    public function getCommandDate(): ?\DateTimeInterface
    {
        return $this->commandDate;
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

    /**
    * @ORM\PrePersist
    */
    public function setPrice()
    {
        $tickets = $this->getTickets();

        
            foreach ($tickets as $ticket) {
            
            $this->price += $ticket->getPrice();
        }

        return $this;
    }

    public function getPrice(): ?int
    {
        return $this->price;
    }
    
    /**
    * @ORM\PrePersist
    */
    public function generateToken()
    {
        $min = 4;
        $max = 10;
        $random = mt_rand($min, $max);
        $bytes = openssl_random_pseudo_bytes($random);
        $hex = bin2hex($bytes);
        $token = str_shuffle($hex);

        $this->setToken($token);
    }

    public function setPaid($paid)
    {
        $this->paid = $paid;

        return $this;
    }

    public function getPaid(): ?bool
    {
        return $this->paid;
    }

    /**
    * @ORM\PrePersist
    */
    public function getNumberOfTickets()
    {
       $number =  count($this->getTickets());

       $this->setNumberOfPlaces($number);
    }

    /**
     * @return Collection|Ticket[]
     */
    public function getTickets(): Collection
    {
        return $this->tickets;
    }

    public function addTicket(Ticket $ticket): self
    {
        if (!$this->tickets->contains($ticket)) {
            $this->tickets[] = $ticket;
            $ticket->setCommand($this);
        }

        return $this;
    }

    public function removeTicket(Ticket $ticket): self
    {
        if ($this->tickets->contains($ticket)) {
            $this->tickets->removeElement($ticket);
            // set the owning side to null (unless already changed)
            if ($ticket->getCommand() === $this) {
                $ticket->setCommand(null);
            }
        }

        return $this;
    }

    /**
     * @Assert\Callback
     */
    public function validateHour(ExecutionContextInterface $context, $payload)
    {

        $today = new \DateTime();
        $visit = $this->getVisitDay();
        $type = $this->getTycketsType();

        if ($visit->format('Y-m-d') === $today->format('Y-m-d')) {
            
                if ($type === 'journée' && $today->format('H') >= 14) {

                
                     $context->buildViolation('vous ne pouvez commander pour une journée après 14h aujourd\'hui')
                    ->atPath('tycketsType')
                    ->addViolation();
            }
        }
    }

    /**
     * @Assert\Callback
     */
    public function validateVisitDay(ExecutionContextInterface $context, $payload)
    {

        $today = new \DateTime();
        $visit = $this->getVisitDay();
        

        if ($visit->format('l') === 'Tuesday') {
                
             $context->buildViolation('vous ne pouvez commander pour un jour fermeture')
            ->atPath('visitDay')
            ->addViolation();  
        } elseif ($visit->format('m-d') === '1-5') {
            $context->buildViolation('vous ne pouvez commander pour un jour ferié')
            ->atPath('visitDay')
            ->addViolation();  
        } elseif ($visit->format('m-d') === '12-25') {
            $context->buildViolation('vous ne pouvez commander pour un jour ferié')
            ->atPath('visitDay')
            ->addViolation();
        }
    }

     /**
     * @Assert\Callback
     */
     public function validateNumberOfPlaces(ExecutionContextInterface $context, $payload)
     {
        $number =  count($this->getTickets());
        if ($number === 0) {
            $context->buildViolation('vous ne pouvez pas passer une commande vide')
            ->atPath('visitDay')
            ->addViolation();  
        }
        
     }
   

}
