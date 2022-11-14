<?php

namespace App\Entity;

use App\Repository\HackathonRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: HackathonRepository::class)]
class Hackathon
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $DATEDEBUT = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $DATEFIN = null;

    #[ORM\Column(type: Types::TIME_MUTABLE)]
    private ?\DateTimeInterface $HEUREDEBUT = null;

    #[ORM\Column(type: Types::TIME_MUTABLE)]
    private ?\DateTimeInterface $HEUREFIN = null;

    #[ORM\Column(length: 255)]
    private ?string $LIEU = null;

    #[ORM\Column(length: 255)]
    private ?string $RUE = null;

    #[ORM\Column(length: 255)]
    private ?string $VILLE = null;

    #[ORM\Column(length: 5)]
    private ?string $CP = null;

    #[ORM\Column(length: 255)]
    private ?string $THEME = null;

    #[ORM\Column(length: 255)]
    private ?string $DESCRIPTION = null;

    #[ORM\Column(length: 255)]
    private ?string $IMAGE = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $DATELIMITE = null;

    #[ORM\Column]
    private ?int $NBPLACES = null;

    public function getId(): ?int
    {
        return $this->id;
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

    public function getHEUREDEBUT(): ?\DateTimeInterface
    {
        return $this->HEUREDEBUT;
    }

    public function setHEUREDEBUT(\DateTimeInterface $HEUREDEBUT): self
    {
        $this->HEUREDEBUT = $HEUREDEBUT;

        return $this;
    }

    public function getHEUREFIN(): ?\DateTimeInterface
    {
        return $this->HEUREFIN;
    }

    public function setHEUREFIN(\DateTimeInterface $HEUREFIN): self
    {
        $this->HEUREFIN = $HEUREFIN;

        return $this;
    }

    public function getLIEU(): ?string
    {
        return $this->LIEU;
    }

    public function setLIEU(string $LIEU): self
    {
        $this->LIEU = $LIEU;

        return $this;
    }

    public function getRUE(): ?string
    {
        return $this->RUE;
    }

    public function setRUE(string $RUE): self
    {
        $this->RUE = $RUE;

        return $this;
    }

    public function getVILLE(): ?string
    {
        return $this->VILLE;
    }

    public function setVILLE(string $VILLE): self
    {
        $this->VILLE = $VILLE;

        return $this;
    }

    public function getCP(): ?string
    {
        return $this->CP;
    }

    public function setCP(string $CP): self
    {
        $this->CP = $CP;

        return $this;
    }

    public function getTHEME(): ?string
    {
        return $this->THEME;
    }

    public function setTHEME(string $THEME): self
    {
        $this->THEME = $THEME;

        return $this;
    }

    public function getDESCRIPTION(): ?string
    {
        return $this->DESCRIPTION;
    }

    public function setDESCRIPTION(string $DESCRIPTION): self
    {
        $this->DESCRIPTION = $DESCRIPTION;

        return $this;
    }

    public function getIMAGE(): ?string
    {
        return $this->IMAGE;
    }

    public function setIMAGE(string $IMAGE): self
    {
        $this->IMAGE = $IMAGE;

        return $this;
    }

    public function getDATELIMITE(): ?\DateTimeInterface
    {
        return $this->DATELIMITE;
    }

    public function setDATELIMITE(\DateTimeInterface $DATELIMITE): self
    {
        $this->DATELIMITE = $DATELIMITE;

        return $this;
    }

    public function getNBPLACES(): ?int
    {
        return $this->NBPLACES;
    }

    public function setNBPLACES(int $NBPLACES): self
    {
        $this->NBPLACES = $NBPLACES;

        return $this;
    }
}
