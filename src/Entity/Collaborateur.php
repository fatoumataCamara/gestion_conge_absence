<?php

namespace App\Entity;

use App\Repository\CollaborateurRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CollaborateurRepository::class)
 */
class Collaborateur
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
    private $matricule;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nom;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $prenom;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $sexe;

    /**
     * @ORM\Column(type="date")
     */
    private $datedenaissance;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $lieudenaissance;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nationalite;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $religion;

    /**
     * @ORM\Column(type="integer")
     */
    private $num_cni;

    /**
     * @ORM\Column(type="integer")
     */
    private $num_tel;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $email;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $adresse;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $fonction;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $categorie;

    /**
     * @ORM\Column(type="date")
     */
    private $date_recrut;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $situation_matri;

    /**
     * @ORM\Column(type="integer")
     */
    private $nombre_enfant;

    /**
     * @ORM\OneToMany(targetEntity=DemandeConge::class, mappedBy="collaborateur")
     */
    private $demandeConges;

    /**
     * @ORM\OneToMany(targetEntity=DemandeAutorisationAbs::class, mappedBy="collaborateur")
     */
    private $demandeAutorisationAbs;

    public function __construct()
    {
        $this->demandeConges = new ArrayCollection();
        $this->demandeAutorisationAbs = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getMatricule(): ?string
    {
        return $this->matricule;
    }

    public function setMatricule(string $matricule): self
    {
        $this->matricule = $matricule;

        return $this;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    public function getPrenom(): ?string
    {
        return $this->prenom;
    }

    public function setPrenom(string $prenom): self
    {
        $this->prenom = $prenom;

        return $this;
    }

    public function getSexe(): ?string
    {
        return $this->sexe;
    }

    public function setSexe(string $sexe): self
    {
        $this->sexe = $sexe;

        return $this;
    }

    public function getDatedenaissance(): ?\DateTimeInterface
    {
        return $this->datedenaissance;
    }

    public function setDatedenaissance(\DateTimeInterface $datedenaissance): self
    {
        $this->datedenaissance = $datedenaissance;

        return $this;
    }

    public function getLieudenaissance(): ?string
    {
        return $this->lieudenaissance;
    }

    public function setLieudenaissance(string $lieudenaissance): self
    {
        $this->lieudenaissance = $lieudenaissance;

        return $this;
    }

    public function getNationalite(): ?string
    {
        return $this->nationalite;
    }

    public function setNationalite(string $nationalite): self
    {
        $this->nationalite = $nationalite;

        return $this;
    }

    public function getReligion(): ?string
    {
        return $this->religion;
    }

    public function setReligion(string $religion): self
    {
        $this->religion = $religion;

        return $this;
    }

    public function getNumCni(): ?int
    {
        return $this->num_cni;
    }

    public function setNumCni(int $num_cni): self
    {
        $this->num_cni = $num_cni;

        return $this;
    }

    public function getNumTel(): ?int
    {
        return $this->num_tel;
    }

    public function setNumTel(int $num_tel): self
    {
        $this->num_tel = $num_tel;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getAdresse(): ?string
    {
        return $this->adresse;
    }

    public function setAdresse(string $adresse): self
    {
        $this->adresse = $adresse;

        return $this;
    }

    public function getFonction(): ?string
    {
        return $this->fonction;
    }

    public function setFonction(string $fonction): self
    {
        $this->fonction = $fonction;

        return $this;
    }

    public function getCategorie(): ?string
    {
        return $this->categorie;
    }

    public function setCategorie(string $categorie): self
    {
        $this->categorie = $categorie;

        return $this;
    }

    public function getDateRecrut(): ?\DateTimeInterface
    {
        return $this->date_recrut;
    }

    public function setDateRecrut(\DateTimeInterface $date_recrut): self
    {
        $this->date_recrut = $date_recrut;

        return $this;
    }

    public function getSituationMatri(): ?string
    {
        return $this->situation_matri;
    }

    public function setSituationMatri(string $situation_matri): self
    {
        $this->situation_matri = $situation_matri;

        return $this;
    }

    public function getNombreEnfant(): ?int
    {
        return $this->nombre_enfant;
    }

    public function setNombreEnfant(int $nombre_enfant): self
    {
        $this->nombre_enfant = $nombre_enfant;

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
            $demandeConge->setCollaborateur($this);
        }

        return $this;
    }

    public function removeDemandeConge(DemandeConge $demandeConge): self
    {
        if ($this->demandeConges->removeElement($demandeConge)) {
            // set the owning side to null (unless already changed)
            if ($demandeConge->getCollaborateur() === $this) {
                $demandeConge->setCollaborateur(null);
            }
        }

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
            $demandeAutorisationAb->setCollaborateur($this);
        }

        return $this;
    }

    public function removeDemandeAutorisationAb(DemandeAutorisationAbs $demandeAutorisationAb): self
    {
        if ($this->demandeAutorisationAbs->removeElement($demandeAutorisationAb)) {
            // set the owning side to null (unless already changed)
            if ($demandeAutorisationAb->getCollaborateur() === $this) {
                $demandeAutorisationAb->setCollaborateur(null);
            }
        }

        return $this;
    }
}
