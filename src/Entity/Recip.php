<?php

namespace App\Entity;

use App\Repository\RecipRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=RecipRepository::class)
 */
class Recip
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @ORM\Column(type="time", nullable=true)
     */
    private $makeTime;

    /**
     * @ORM\Column(type="json")
     */
    private $step = [];

    /**
     * @ORM\ManyToMany(targetEntity=Ingredient::class, inversedBy="recips")
     */
    private $ingredient;

    public function __construct()
    {
        $this->ingredient = new ArrayCollection();
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

    public function getMakeTime(): ?\DateTimeInterface
    {
        return $this->makeTime;
    }

    public function setMakeTime(?\DateTimeInterface $makeTime): self
    {
        $this->makeTime = $makeTime;

        return $this;
    }

    public function getStep(): ?array
    {
        return $this->step;
    }

    public function setStep(array $step): self
    {
        $this->step = $step;

        return $this;
    }

    /**
     * @return Collection|Ingredient[]
     */
    public function getIngredient(): Collection
    {
        return $this->ingredient;
    }

    public function addIngredient(Ingredient $ingredient): self
    {
        if (!$this->ingredient->contains($ingredient)) {
            $this->ingredient[] = $ingredient;
        }

        return $this;
    }

    public function removeIngredient(Ingredient $ingredient): self
    {
        $this->ingredient->removeElement($ingredient);

        return $this;
    }

}
