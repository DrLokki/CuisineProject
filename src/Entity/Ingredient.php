<?php

namespace App\Entity;

use App\Repository\IngredientRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=IngredientRepository::class)
 */
class Ingredient
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
     * @ORM\Column(type="integer")
     */
    private $quantity;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $outDate;

    /**
     * @ORM\ManyToMany(targetEntity=Recip::class, mappedBy="ingredient")
     */
    private $recips;

    public function __construct()
    {
        $this->recips = new ArrayCollection();
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

    public function getQuantity(): ?int
    {
        return $this->quantity;
    }

    public function setQuantity(int $quantity): self
    {
        $this->quantity = $quantity;

        return $this;
    }

    public function getOutDate(): ?\DateTimeInterface
    {
        return $this->outDate;
    }

    public function setOutDate(?\DateTimeInterface $outDate): self
    {
        $this->outDate = $outDate;

        return $this;
    }

    /**
     * @return Collection|Recip[]
     */
    public function getRecips(): Collection
    {
        return $this->recips;
    }

    public function addRecip(Recip $recip): self
    {
        if (!$this->recips->contains($recip)) {
            $this->recips[] = $recip;
            $recip->addIngredient($this);
        }

        return $this;
    }

    public function removeRecip(Recip $recip): self
    {
        if ($this->recips->removeElement($recip)) {
            $recip->removeIngredient($this);
        }

        return $this;
    }

}
