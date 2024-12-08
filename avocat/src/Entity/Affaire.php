<?php

namespace App\Entity;

use App\Repository\AffaireRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=AffaireRepository::class)
 */
class Affaire
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
    private $Contenu;

    /**
     * @ORM\ManyToOne(targetEntity=TypeAffaire::class, inversedBy="affaires")
     * @ORM\JoinColumn(nullable=false)
     */
    
    private $typeAffaire;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getContenu(): ?string
    {
        return $this->Contenu;
    }

    public function setContenu(string $Contenu): self
    {
        $this->Contenu = $Contenu;

        return $this;
    }

    public function getTypeAffaire(): ?TypeAffaire
    {
        return $this->typeAffaire;
    }

    public function setTypeAffaire(?TypeAffaire $typeAffaire): self
    {
        $this->typeAffaire = $typeAffaire;

        return $this;
    }
    public function __toString() {
        return $this->Contenu;
    }
}
