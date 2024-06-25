<?php

namespace App\Entity;

use App\Repository\ArtistRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups as GroupsSerializer;


#[ORM\Entity(repositoryClass: ArtistRepository::class)]
class Artist
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    #[GroupsSerializer(['list'])]
    private ?int $id = null;

    #[GroupsSerializer(['list'])]
    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[GroupsSerializer(['list'])]
    #[ORM\Column(length: 255)]
    private ?string $role = null;

    #[ORM\ManyToMany(targetEntity: Groups::class, mappedBy: 'artists')]
    private Collection $listGroup;

    public function __construct()
    {
        $this->listGroup = new ArrayCollection();
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

    public function getRole(): ?string
    {
        return $this->role;
    }

    public function setRole(string $role): static
    {
        $this->role = $role;

        return $this;
    }

    /**
     * @return Collection<int, Groups>
     */
    public function getListGroup(): Collection
    {
        return $this->listGroup;
    }

    public function addListGroup(Groups $listGroup): static
    {
        if (!$this->listGroup->contains($listGroup)) {
            $this->listGroup->add($listGroup);
            $listGroup->addArtit($this);
        }

        return $this;
    }

    public function removeListGroup(Groups $listGroup): static
    {
        if ($this->listGroup->removeElement($listGroup)) {
            $listGroup->removeArtit($this);
        }

        return $this;
    }

    public function __toString(){
        return $this->name." / ".$this->role;
    }
}