<?php

namespace App\Entity;

use App\Repository\DemandeAutorisationAbsRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=DemandeAutorisationAbsRepository::class)
 */
class DemandeAutorisationAbs
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     */
    private $numdemande;

    /**
     * @ORM\Column(type="date")
     */
    private $datedemande;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $date;

    /**
     * @ORM\Column(type="date")
     */
    private $dateretour;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $piecejustificative;

    /**
     * @ORM\ManyToOne(targetEntity=Collaborateur::class, inversedBy="demandeAutorisationAbs")
     */
    private $collaborateur;

    /**
     * @ORM\ManyToOne(targetEntity=TypeAbsence::class, inversedBy="demandeAutorisationAbs")
     */
    private $typeabsence;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNumdemande(): ?int
    {
        return $this->numdemande;
    }

    public function setNumdemande(int $numdemande): self
    {
        $this->numdemande = $numdemande;

        return $this;
    }

    public function getDatedemande(): ?\DateTimeInterface
    {
        return $this->datedemande;
    }

    public function setDatedemande(\DateTimeInterface $datedemande): self
    {
        $this->datedemande = $datedemande;

        return $this;
    }

    public function getDate(): ?string
    {
        return $this->date;
    }

    public function setDate(string $date): self
    {
        $this->date = $date;

        return $this;
    }

    public function getDateretour(): ?\DateTimeInterface
    {
        return $this->dateretour;
    }

    public function setDateretour(\DateTimeInterface $dateretour): self
    {
        $this->dateretour = $dateretour;

        return $this;
    }

    public function getPiecejustificative(): ?string
    {
        return $this->piecejustificative;
    }

    public function setPiecejustificative(string $piecejustificative): self
    {
        $this->piecejustificative = $piecejustificative;

        return $this;
    }

    public function getCollaborateur(): ?Collaborateur
    {
        return $this->collaborateur;
    }

    public function setCollaborateur(?Collaborateur $collaborateur): self
    {
        $this->collaborateur = $collaborateur;

        return $this;
    }

    public function getTypeabsence(): ?TypeAbsence
    {
        return $this->typeabsence;
    }

    public function setTypeabsence(?TypeAbsence $typeabsence): self
    {
        $this->typeabsence = $typeabsence;

        return $this;
    }
}
