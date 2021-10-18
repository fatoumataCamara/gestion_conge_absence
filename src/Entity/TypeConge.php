<?php

namespace App\Entity;

use App\Repository\TypeCongeRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=TypeCongeRepository::class)
 */
class TypeConge
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
    private $nomTypeConge;

    /**
     * @ORM\Column(type="integer")
     */
    private $nbrejourmax;

    /**
     * @ORM\OneToMany(targetEntity=DemandeConge::class, mappedBy="typeconge")
     */
    private $demandeConges;

    public function __construct()
    {
        $this->demandeConges = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomTypeConge(): ?string
    {
        return $this->nomTypeConge;
    }

    public function setNomTypeConge(string $nomTypeConge): self
    {
        $this->nomTypeConge = $nomTypeConge;

        return $this;
    }

    public function getNbrejourmax(): ?int
    {
        return $this->nbrejourmax;
    }

    public function setNbrejourmax(int $nbrejourmax): self
    {
        $this->nbrejourmax = $nbrejourmax;

        return $this;
    }

    /**
     * @return Collection|DemandeConge[]
     */
    public function getDemandeConges(): Collection
    {
        return $this->demandeConges;
    }

    public function addDemandeConge(DemandeConge $demandeConge): self
    {
        if (!$this->demandeConges->contains($demandeConge)) {
            $this->demandeConges[] = $demandeConge;
            $demandeConge->setTypeconge($this);
        }

        return $this;
    }

    public function removeDemandeConge(DemandeConge $demandeConge): self
    {
        if ($this->demandeConges->removeElement($demandeConge)) {
            // set the owning side to null (unless already changed)
            if ($demandeConge->getTypeconge() === $this) {
                $demandeConge->setTypeconge(null);
            }
        }

        return $this;
    }
}
