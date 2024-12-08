<?php

namespace App\Entity;

use App\Repository\ClientRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ClientRepository::class)
 */
class Client
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
    private $Name;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Lastname;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Email;

    /**
     * @ORM\Column(type="date")
     */
    private $DateBirthday;

    /**
     * @ORM\Column(type="integer")
     */
    private $PhoneNumber;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $City;

    /**
     * @ORM\OneToOne(targetEntity=Dossier::class, mappedBy="id_client", cascade={"persist", "remove"})
     */
    private $dossier;

    /**
     * @ORM\OneToMany(targetEntity=DateRDV::class, mappedBy="id_client")
     */
    private $dateRDVs;

    public function __construct()
    {
        $this->dateRDVs = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->Name;
    }

    public function setName(string $Name): self
    {
        $this->Name = $Name;

        return $this;
    }

    public function getLastname(): ?string
    {
        return $this->Lastname;
    }

    public function setLastname(string $Lastname): self
    {
        $this->Lastname = $Lastname;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->Email;
    }

    public function setEmail(string $Email): self
    {
        $this->Email = $Email;

        return $this;
    }

    public function getDateBirthday(): ?\DateTimeInterface
    {
        return $this->DateBirthday;
    }

    public function setDateBirthday(\DateTimeInterface $DateBirthday): self
    {
        $this->DateBirthday = $DateBirthday;

        return $this;
    }

    public function getPhoneNumber(): ?int
    {
        return $this->PhoneNumber;
    }

    public function setPhoneNumber(int $PhoneNumber): self
    {
        $this->PhoneNumber = $PhoneNumber;

        return $this;
    }

    public function getCity(): ?string
    {
        return $this->City;
    }

    public function setCity(string $City): self
    {
        $this->City = $City;

        return $this;
    }

    public function getDossier(): ?Dossier
    {
        return $this->dossier;
    }

    public function setDossier(Dossier $dossier): self
    {
        // set the owning side of the relation if necessary
        if ($dossier->getIdClient() !== $this) {
            $dossier->setIdClient($this);
        }

        $this->dossier = $dossier;

        return $this;
    }

    /**
     * @return Collection|DateRDV[]
     */
    public function getDateRDVs(): Collection
    {
        return $this->dateRDVs;
    }

    public function addDateRDV(DateRDV $dateRDV): self
    {
        if (!$this->dateRDVs->contains($dateRDV)) {
            $this->dateRDVs[] = $dateRDV;
            $dateRDV->setIdClient($this);
        }

        return $this;
    }
    public function __toString() {
        return $this->Name;
    }

    public function removeDateRDV(DateRDV $dateRDV): self
    {
        if ($this->dateRDVs->removeElement($dateRDV)) {
            // set the owning side to null (unless already changed)
            if ($dateRDV->getIdClient() === $this) {
                $dateRDV->setIdClient(null);
            }
        }

        return $this;
    }
}
