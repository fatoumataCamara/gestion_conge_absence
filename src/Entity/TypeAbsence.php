<?php

namespace App\Entity;

use App\Repository\TypeAbsenceRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=TypeAbsenceRepository::class)
 */
class TypeAbsence
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
    private $nomtypeabs;

    /**
     * @ORM\Column(type="integer")
     */
    private $nbrejourmax;

    /**
     * @ORM\OneToMany(targetEntity=DemandeAutorisationAbs::class, mappedBy="typeabsence")
     */
    private $demandeAutorisationAbs;

    public function __construct()
    {
        $this->demandeAutorisationAbs = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomtypeabs(): ?string
    {
        return $this->nomtypeabs;
    }

    public function setNomtypeabs(string $nomtypeabs): self
    {
        $this->nomtypeabs = $nomtypeabs;

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
     * @return Collection|DemandeAutorisationAbs[]
     */
    public function getDemandeAutorisationAbs(): Collection
    {
        return $this->demandeAutorisationAbs;
    }

    public function addDemandeAutorisationAb(DemandeAutorisationAbs $demandeAutorisationAb): self
    {
        if (!$this->demandeAutorisationAbs->contains($demandeAutorisationAb)) {
            $this->demandeAutorisationAbs[] = $demandeAutorisationAb;
            $demandeAutorisationAb->setTypeabsence($this);
        }

        return $this;
    }

    public function removeDemandeAutorisationAb(DemandeAutorisationAbs $demandeAutorisationAb): self
    {
        if ($this->demandeAutorisationAbs->removeElement($demandeAutorisationAb)) {
            // set the owning side to null (unless already changed)
            if ($demandeAutorisationAb->getTypeabsence() === $this) {
                $demandeAutorisationAb->setTypeabsence(null);
            }
        }

        return $this;
    }
}
