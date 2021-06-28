<?php

namespace App\Entity;

use App\Repository\LogementRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=LogementRepository::class)
 */
class Logement
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
    private $superficie;

    /**
     * @ORM\Column(type="integer")
     */
    private $nbPieceHabitable;

    /**
     * @ORM\Column(type="string", length=150)
     */
    private $typeLogement;

    /**
     * @ORM\Column(type="string", length=250)
     */
    private $adresse;

    /**
     * @ORM\Column(type="integer")
     */
    private $codePostal;

    /**
     * @ORM\Column(type="boolean")
     */
    private $piscine;

    /**
     * @ORM\Column(type="boolean")
     */
    private $exterieur;

    /**
     * @ORM\Column(type="integer")
     */
    private $surface;

    /**
     * @ORM\Column(type="boolean")
     */
    private $garage;

    /**
     * @ORM\Column(type="string", length=75)
     */
    private $venteLocation;

    /**
     * @ORM\Column(type="integer")
     */
    private $prixVenteLocation;

    /**
     * @ORM\Column(type="datetime")
     */
    private $dateParution;

    /**
     * @ORM\Column(type="string", length=250)
     */
    private $photo;

    /**
     * @ORM\Column(type="string", length=150)
     */
    private $ville;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getSuperficie(): ?int
    {
        return $this->superficie;
    }

    public function setSuperficie(int $superficie): self
    {
        $this->superficie = $superficie;

        return $this;
    }

    public function getNbPieceHabitable(): ?int
    {
        return $this->nbPieceHabitable;
    }

    public function setNbPieceHabitable(int $nbPieceHabitable): self
    {
        $this->nbPieceHabitable = $nbPieceHabitable;

        return $this;
    }

    public function getTypeLogement(): ?string
    {
        return $this->typeLogement;
    }

    public function setTypeLogement(string $typeLogement): self
    {
        $this->typeLogement = $typeLogement;

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

    public function getCodePostal(): ?int
    {
        return $this->codePostal;
    }

    public function setCodePostal(int $codePostal): self
    {
        $this->codePostal = $codePostal;

        return $this;
    }

    public function getPiscine(): ?bool
    {
        return $this->piscine;
    }

    public function setPiscine(bool $piscine): self
    {
        $this->piscine = $piscine;

        return $this;
    }

    public function getExterieur(): ?bool
    {
        return $this->exterieur;
    }

    public function setExterieur(bool $exterieur): self
    {
        $this->exterieur = $exterieur;

        return $this;
    }

    public function getSurface(): ?int
    {
        return $this->surface;
    }

    public function setSurface(int $surface): self
    {
        $this->surface = $surface;

        return $this;
    }

    public function getGarage(): ?bool
    {
        return $this->garage;
    }

    public function setGarage(bool $garage): self
    {
        $this->garage = $garage;

        return $this;
    }

    public function getVenteLocation(): ?string
    {
        return $this->venteLocation;
    }

    public function setVenteLocation(string $venteLocation): self
    {
        $this->venteLocation = $venteLocation;

        return $this;
    }

    public function getPrixVenteLocation(): ?int
    {
        return $this->prixVenteLocation;
    }

    public function setPrixVenteLocation(int $prixVenteLocation): self
    {
        $this->prixVenteLocation = $prixVenteLocation;

        return $this;
    }

    public function getDateParution(): ?\DateTimeInterface
    {
        return $this->dateParution;
    }

    public function setDateParution(\DateTimeInterface $dateParution): self
    {
        $this->dateParution = $dateParution;

        return $this;
    }

    public function getPhoto(): ?string
    {
        return $this->photo;
    }

    public function setPhoto(string $photo): self
    {
        $this->photo = $photo;

        return $this;
    }

    public function getVille(): ?string
    {
        return $this->ville;
    }

    public function setVille(string $ville): self
    {
        $this->ville = $ville;

        return $this;
    }
}
