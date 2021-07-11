<?php

namespace App\Entity;

use App\Repository\VoitureRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

/**
 * @ORM\Entity(repositoryClass=VoitureRepository::class)
 * @UniqueEntity(
 *     fields={"assurance"},
 *     message="Erreur il existe deja"
 * )
 * @UniqueEntity(
 *     fields={"carte_grise"},
 *     message="Erreur il existe deja"
 * )
 * @UniqueEntity(
 *     fields={"matricule"},
 *     message="Erreur il existe deja"
 * )
 */
class Voiture
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
    private $marque;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $model;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $assurance;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $carte_grise;

    /**
     * @ORM\ManyToOne(targetEntity=Chauffeur::class, inversedBy="voitures")
     */
    private $chaufvoit;

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

    public function getMarque(): ?string
    {
        return $this->marque;
    }

    public function setMarque(string $marque): self
    {
        $this->marque = $marque;

        return $this;
    }

    public function getModel(): ?string
    {
        return $this->model;
    }

    public function setModel(string $model): self
    {
        $this->model = $model;

        return $this;
    }

    public function getAssurance(): ?string
    {
        return $this->assurance;
    }

    public function setAssurance(string $assurance): self
    {
        $this->assurance = $assurance;

        return $this;
    }

    public function getCarteGrise(): ?string
    {
        return $this->carte_grise;
    }

    public function setCarteGrise(string $carte_grise): self
    {
        $this->carte_grise = $carte_grise;

        return $this;
    }

    public function getChaufvoit(): ?Chauffeur
    {
        return $this->chaufvoit;
    }

    public function setChaufvoit(?Chauffeur $chaufvoit): self
    {
        $this->chaufvoit = $chaufvoit;

        return $this;
    }
}
