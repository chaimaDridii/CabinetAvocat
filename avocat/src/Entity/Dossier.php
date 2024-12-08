<?php

namespace App\Entity;

use App\Repository\DossierRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=DossierRepository::class)
 */
class Dossier
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
    private $Payyement;

    /**
     * @ORM\Column(type="date")
     */
    private $CreatedAt;

    /**
     * @ORM\OneToOne(targetEntity=Client::class, inversedBy="dossier", cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $id_client;

    /**
     * @ORM\ManyToMany(targetEntity=Affaire::class)
     */
    private $id_procedure;

    public function __construct()
    {
        $this->id_procedure = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPayyement(): ?int
    {
        return $this->Payyement;
    }

    public function setPayyement(int $Payyement): self
    {
        $this->Payyement = $Payyement;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeInterface
    {
        return $this->CreatedAt;
    }

    public function setCreatedAt(\DateTimeInterface $CreatedAt): self
    {
        $this->CreatedAt = $CreatedAt;

        return $this;
    }

    public function getIdClient(): ?Client
    {
        return $this->id_client;
    }

    public function setIdClient(Client $id_client): self
    {
        $this->id_client = $id_client;

        return $this;
    }

    /**
     * @return Collection|Affaire[]
     */
    public function getIdProcedure(): Collection
    {
        return $this->id_procedure;
    }

    public function addIdProcedure(Affaire $idProcedure): self
    {
        if (!$this->id_procedure->contains($idProcedure)) {
            $this->id_procedure[] = $idProcedure;
        }

        return $this;
    }

    public function removeIdProcedure(Affaire $idProcedure): self
    {
        $this->id_procedure->removeElement($idProcedure);

        return $this;
    }
}
