<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\MonthRepository")
 */
class Month
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
     * @ORM\ManyToMany(targetEntity="App\Entity\Vegetable", inversedBy="months")
     */
    private $vegetable;


    public function __construct()
    {
        $this->vegetable = new ArrayCollection();
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

}
