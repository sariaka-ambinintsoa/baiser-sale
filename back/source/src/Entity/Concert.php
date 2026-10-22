<?php

namespace App\Entity;

use App\Repository\ConcertRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ConcertRepository::class)]
class Concert
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $descriptions = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $dateConcert = null;

    #[ORM\Column(length: 255)]
    private ?string $pictures = null;

    #[ORM\Column(length: 255)]
    private ?string $tag = null;

    #[ORM\Column]
    private ?int $prix = null;

    #[ORM\Column]
    private ?int $numberOfPlace = null;

    #[ORM\ManyToMany(targetEntity: Groups::class, inversedBy: 'concerts')]
    private Collection $groupName;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    public function __construct()
    {
        $this->groupName = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): static
    {
        $this->name = $name;

        return $this;
    }

    public function getDescriptions(): ?string
    {
        return $this->descriptions;
    }

    public function setDescriptions(string $descriptions): static
    {
        $this->descriptions = $descriptions;

        return $this;
    }

    public function getDateConcert(): ?\DateTimeInterface
    {
        return $this->dateConcert;
    }

    public function setDateConcert(\DateTimeInterface $dateConcert): static
    {
        $this->dateConcert = $dateConcert;

        return $this;
    }

    public function getPictures(): ?string
    {
        return $this->pictures;
    }

    public function setPictures(string $pictures): static
    {
        $this->pictures = $pictures;

        return $this;
    }

    public function getTag(): ?string
    {
        return $this->tag;
    }

    public function setTag(string $tag): static
    {
        $this->tag = $tag;

        return $this;
    }

    public function getPrix(): ?int
    {
        return $this->prix;
    }

    public function setPrix(int $prix): static
    {
        $this->prix = $prix;

        return $this;
    }

    public function getNumberOfPlace(): ?int
    {
        return $this->numberOfPlace;
    }

    public function setNumberOfPlace(int $numberOfPlace): static
    {
        $this->numberOfPlace = $numberOfPlace;

        return $this;
    }

    /**
     * @return Collection<int, Groups>
     */
    public function getGroupName(): Collection
    {
        return $this->groupName;
    }

    public function addGroupName(Groups $groupName): static
    {
        if (!$this->groupName->contains($groupName)) {
            $this->groupName->add($groupName);
        }

        return $this;
    }

    public function removeGroupName(Groups $groupName): static
    {
        $this->groupName->removeElement($groupName);

        return $this;
    }

}
