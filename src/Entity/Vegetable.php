<?php

namespace App\Entity;

use App\Entity\Month;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\Collection;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @ORM\Entity(repositoryClass="App\Repository\VegetableRepository")
 */
class Vegetable
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $name;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Garden", inversedBy="vegetables")
     */
    private $garden;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Month", mappedBy="vegetable")
     */
    private $months;


    public function __construct()
    {
        $this->garden = new ArrayCollection();
        $this->seasons = new ArrayCollection();
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

    public function setName(?string $name): self
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return Collection|Garden[]
     */
    public function getGarden(): Collection
    {
        return $this->garden;
    }

    public function addGarden(Garden $garden): self
    {
        if (!$this->garden->contains($garden)) {
            $this->garden[] = $garden;
        }

        return $this;
    }

    public function removeGarden(Garden $garden): self
    {
        if ($this->garden->contains($garden)) {
            $this->garden->removeElement($garden);
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
            $month->addVegetable($this);
        }

        return $this;
    }

    public function removeMonth(Month $month): self
    {
        if ($this->months->contains($month)) {
            $this->months->removeElement($month);
            $month->removeVegetable($this);
        }

        return $this;
    }

}
