<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;

/**
 * @ORM\Entity(repositoryClass="App\Repository\TycketsTypeRepository")
 */
class TycketsType
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
    private $type;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Tickets", mappedBy="tycketsType")
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

    public function getType(): ?string
    {
        return $this->type;
    }

    public function setType(string $type): self
    {
        $this->type = $type;

        return $this;
    }

    public function addTickets(Tickets $tickets)
    {
        $this->tickets[] = $tickets;

        $tickets->setTycketsTypes($this);

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
