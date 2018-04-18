<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\PriceRepository")
 */
class Price
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
    private $normal;

    /**
     * @ORM\Column(type="integer")
     */
    private $children;

    /**
     * @ORM\Column(type="integer")
     */
    private $senior;

    /**
     * @ORM\Column(type="integer")
     */
    private $reduct;

    /**
     * @ORM\Column(type="integer")
     */
    private $free;


    public function getId()
    {
        return $this->id;
    }


    public function getNormal(): ?int
    {
        return $this->normal;
    }

    public function setNormal(int $normal): self
    {
        $this->normal = $normal;

        return $this;
    }

    public function getChildren(): ?int
    {
        return $this->children;
    }

    public function setChildren(int $children): self
    {
        $this->children = $children;

        return $this;
    }

    public function getSenior(): ?int
    {
        return $this->senior;
    }

    public function setSenior(int $senior): self
    {
        $this->senior = $senior;

        return $this;
    }

    public function getReduct(): ?int
    {
        return $this->reduct;
    }

    public function setReduct(int $reduct): self
    {
        $this->reduct = $reduct;

        return $this;
    }

    public function getFree(): ?int
    {
        return $this->free;
    }

    public function setFree(int $free): self
    {
        $this->free = $free;

        return $this;
    }
}
