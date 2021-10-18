<?php

namespace App\Entity;

use App\Repository\TraiterDemandeCongeRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=TraiterDemandeCongeRepository::class)
 */
class TraiterDemandeConge
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
     * @ORM\Column(type="boolean")
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

    public function getAvis(): ?bool
    {
        return $this->avis;
    }

    public function setAvis(bool $avis): self
    {
        $this->avis = $avis;

        return $this;
    }
}
