<?php

namespace App\Entity;

use App\Repository\DateRDVRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=DateRDVRepository::class)
 */
class DateRDV
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="date")
     */
    private $DateRDV;

    /**
     * @ORM\ManyToOne(targetEntity=Client::class, inversedBy="dateRDVs")
     * @ORM\JoinColumn(nullable=false)
     */
    private $id_client;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDateRDV(): ?\DateTimeInterface
    {
        return $this->DateRDV;
    }

    public function setDateRDV(\DateTimeInterface $DateRDV): self
    {
        $this->DateRDV = $DateRDV;

        return $this;
    }

    public function getIdClient(): ?Client
    {
        return $this->id_client;
    }

    public function setIdClient(?Client $id_client): self
    {
        $this->id_client = $id_client;

        return $this;
    }
}
