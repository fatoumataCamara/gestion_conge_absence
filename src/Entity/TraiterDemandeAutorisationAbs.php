<?php

namespace App\Entity;

use App\Repository\TraiterDemandeAutorisationAbsRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=TraiterDemandeAutorisationAbsRepository::class)
 */
class TraiterDemandeAutorisationAbs
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="boolean")
     */
    private $atraiter;

    /**
     * @ORM\Column(type="date")
     */
    private $datetraitement;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $avis;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getAtraiter(): ?bool
    {
        return $this->atraiter;
    }

    public function setAtraiter(bool $atraiter): self
    {
        $this->atraiter = $atraiter;

        return $this;
    }

    public function getDatetraitement(): ?\DateTimeInterface
    {
        return $this->datetraitement;
    }

    public function setDatetraitement(\DateTimeInterface $datetraitement): self
    {
        $this->datetraitement = $datetraitement;

        return $this;
    }

    public function getAvis(): ?string
    {
        return $this->avis;
    }

    public function setAvis(string $avis): self
    {
        $this->avis = $avis;

        return $this;
    }
}
