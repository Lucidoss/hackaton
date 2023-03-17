<?php

namespace App\Entity;

use App\Repository\FavorisRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: FavorisRepository::class)]
class Favoris
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?int $IDFAVORIS = null;

    #[ORM\Column]
    private ?int $IDPARTICIPANT = null;

    #[ORM\Column]
    private ?int $IDHACKATHON = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIDFAVORIS(): ?int
    {
        return $this->IDFAVORIS;
    }

    public function setIDFAVORIS(int $IDFAVORIS): self
    {
        $this->IDFAVORIS = $IDFAVORIS;

        return $this;
    }

    public function getIDPARTICIPANT(): ?int
    {
        return $this->IDPARTICIPANT;
    }

    public function setIDPARTICIPANT(int $IDPARTICIPANT): self
    {
        $this->IDPARTICIPANT = $IDPARTICIPANT;

        return $this;
    }

    public function getIDHACKATHON(): ?int
    {
        return $this->IDHACKATHON;
    }

    public function setIDHACKATHON(int $IDHACKATHON): self
    {
        $this->IDHACKATHON = $IDHACKATHON;

        return $this;
    }
}
