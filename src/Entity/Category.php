<?php

namespace App\Entity;

use App\Repository\CategoryRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CategoryRepository::class)
 */
class Category
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=450)
     */
    private $shortDescription;

    /**
     * @ORM\Column(type="string", length=4500)
     */
    private $longDescription;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $title;

    /**
     * @ORM\Column(type="string", length=250)
     */
    private $image;

    /**
     * @ORM\OneToMany(targetEntity=Tuto::class, mappedBy="category")
     */
    private $tutos;

    /**
     * @ORM\OneToMany(targetEntity=Devis::class, mappedBy="Category")
     */
    private $devis;

    /**
     * @ORM\OneToMany(targetEntity=Atelier::class, mappedBy="Category")
     */
    private $ateliers;

    /**
     * @ORM\Column(type="string", length=200)
     */
    private $name;

    public function __construct()
    {
        $this->tutos = new ArrayCollection();
        $this->devis = new ArrayCollection();
        $this->ateliers = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getShortDescription(): ?string
    {
        return $this->shortDescription;
    }

    public function setShortDescription(string $shortDescription): self
    {
        $this->shortDescription = $shortDescription;

        return $this;
    }

    public function getLongDescription(): ?string
    {
        return $this->longDescription;
    }

    public function setLongDescription(string $longDescription): self
    {
        $this->longDescription = $longDescription;

        return $this;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    public function getImage(): ?string
    {
        return $this->image;
    }

    public function setImage(string $image): self
    {
        $this->image = $image;

        return $this;
    }

    /**
     * @return Collection|Tuto[]
     */
    public function getTutos(): Collection
    {
        return $this->tutos;
    }

    public function addTuto(Tuto $tuto): self
    {
        if (!$this->tutos->contains($tuto)) {
            $this->tutos[] = $tuto;
            $tuto->setCategory($this);
        }

        return $this;
    }

    public function removeTuto(Tuto $tuto): self
    {
        if ($this->tutos->removeElement($tuto)) {
            // set the owning side to null (unless already changed)
            if ($tuto->getCategory() === $this) {
                $tuto->setCategory(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Devis[]
     */
    public function getDevis(): Collection
    {
        return $this->devis;
    }

    public function addDevi(Devis $devi): self
    {
        if (!$this->devis->contains($devi)) {
            $this->devis[] = $devi;
            $devi->setCategory($this);
        }

        return $this;
    }

    public function removeDevi(Devis $devi): self
    {
        if ($this->devis->removeElement($devi)) {
            // set the owning side to null (unless already changed)
            if ($devi->getCategory() === $this) {
                $devi->setCategory(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Atelier[]
     */
    public function getAteliers(): Collection
    {
        return $this->ateliers;
    }

    public function addAtelier(Atelier $atelier): self
    {
        if (!$this->ateliers->contains($atelier)) {
            $this->ateliers[] = $atelier;
            $atelier->setCategory($this);
        }

        return $this;
    }

    public function removeAtelier(Atelier $atelier): self
    {
        if ($this->ateliers->removeElement($atelier)) {
            // set the owning side to null (unless already changed)
            if ($atelier->getCategory() === $this) {
                $atelier->setCategory(null);
            }
        }

        return $this;
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
}
