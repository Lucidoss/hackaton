<?php

namespace App\Entity;

use App\Repository\AtelierRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AtelierRepository::class)]
#[ORM\Table(name:'atelier')]
class Atelier
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(name:'IDEVENEMENT')]
    private ?int $id = null;

    #[ORM\Column]
    private ?int $NBPARTICIPANTS = null;

    #[ORM\Column(length: 64)]
    private ?string $NOMEVENEMENT = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $DATEDEBUT = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $DATEFIN = null;

    #[ORM\Column(type: Types::TIME_MUTABLE)]
    private ?\DateTimeInterface $DUREE = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNBPARTICIPANTS(): ?int
    {
        return $this->NBPARTICIPANTS;
    }

    public function setNBPARTICIPANTS(int $NBPARTICIPANTS): self
    {
        $this->NBPARTICIPANTS = $NBPARTICIPANTS;

        return $this;
    }

    public function getNOMEVENEMENT(): ?string
    {
        return $this->NOMEVENEMENT;
    }

    public function setNOMEVENEMENT(string $NOMEVENEMENT): self
    {
        $this->NOMEVENEMENT = $NOMEVENEMENT;

        return $this;
    }

    public function getDATEDEBUT(): ?\DateTimeInterface
    {
        return $this->DATEDEBUT;
    }

    public function setDATEDEBUT(\DateTimeInterface $DATEDEBUT): self
    {
        $this->DATEDEBUT = $DATEDEBUT;

        return $this;
    }

    public function getDATEFIN(): ?\DateTimeInterface
    {
        return $this->DATEFIN;
    }

    public function setDATEFIN(\DateTimeInterface $DATEFIN): self
    {
        $this->DATEFIN = $DATEFIN;

        return $this;
    }

    public function getDUREE(): ?\DateTimeInterface
    {
        return $this->DUREE;
    }

    public function setDUREE(\DateTimeInterface $DUREE): self
    {
        $this->DUREE = $DUREE;

        return $this;
    }
}
