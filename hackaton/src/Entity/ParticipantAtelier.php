<?php

namespace App\Entity;

use App\Repository\ParticipantAtelierRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ParticipantAtelierRepository::class)]
#[ORM\Table(name:'participant_atelier')]
class ParticipantAtelier
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(name:'IDPARTICIPANT_ATELIER')]
    private ?int $id = null;

    #[ORM\Column(length: 32)]
    private ?string $NOM = null;

    #[ORM\Column(length: 32)]
    private ?string $PRENOM = null;

    #[ORM\Column(length: 32)]
    private ?string $EMAIL = null;

    #[ORM\ManyToOne(targetEntity:Atelier::class)]
    #[ORM\JoinColumn(name: 'IDATELIER', referencedColumnName:'IDEVENEMENT')]
    private ?Atelier $ATELIERS = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNOM(): ?string
    {
        return $this->NOM;
    }

    public function setNOM(string $NOM): self
    {
        $this->NOM = $NOM;

        return $this;
    }

    public function getPRENOM(): ?string
    {
        return $this->PRENOM;
    }

    public function setPRENOM(string $PRENOM): self
    {
        $this->PRENOM = $PRENOM;

        return $this;
    }

    public function getEMAIL(): ?string
    {
        return $this->EMAIL;
    }

    public function setEMAIL(string $EMAIL): self
    {
        $this->EMAIL = $EMAIL;

        return $this;
    }

    public function getATELIERS(): ?Atelier
    {
        return $this->ATELIERS;
    }

    public function setATELIERS(Atelier $ATELIERS): self
    {
        $this->ATELIERS = $ATELIERS;

        return $this;
    }
}
