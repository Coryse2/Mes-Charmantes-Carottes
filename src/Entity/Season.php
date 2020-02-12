<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\SeasonRepository")
 */
class Season
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
     * @ORM\ManyToMany(targetEntity="App\Entity\Vegetable", inversedBy="seasons")
     */
    private $vegetable;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Month", mappedBy="season")
     */
    private $months;

    public function __construct()
    {
        $this->vegetable = new ArrayCollection();
        $this->months = new ArrayCollection();
    }
    public function __toString()
    {
        return $this->name;
    }
    public function getId(): ?int
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

    /**
     * @return Collection|Vegetable[]
     */
    public function getVegetable(): Collection
    {
        return $this->vegetable;
    }

    public function addVegetable(Vegetable $vegetable): self
    {
        if (!$this->vegetable->contains($vegetable)) {
            $this->vegetable[] = $vegetable;
        }

        return $this;
    }

    public function removeVegetable(Vegetable $vegetable): self
    {
        if ($this->vegetable->contains($vegetable)) {
            $this->vegetable->removeElement($vegetable);
        }

        return $this;
    }

    /**
     * @return Collection|Month[]
     */
    public function getMonths(): Collection
    {
        return $this->months;
    }

    public function addMonth(Month $month): self
    {
        if (!$this->months->contains($month)) {
            $this->months[] = $month;
            $month->setSeason($this);
        }

        return $this;
    }

    public function removeMonth(Month $month): self
    {
        if ($this->months->contains($month)) {
            $this->months->removeElement($month);
            // set the owning side to null (unless already changed)
            if ($month->getSeason() === $this) {
                $month->setSeason(null);
            }
        }

        return $this;
    }
}
