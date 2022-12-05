<?php

namespace App\Entity;

use App\Repository\InscriptionRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: InscriptionRepository::class)]
class Inscription
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(name:'CODE')]
    private ?int $code = null;

    #[ORM\Column]
    private ?int $IDPARTICIPANT = null;

    #[ORM\Column]
    private ?int $IDHACKATHON = null;

    #[ORM\Column(type: Types::DATE_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $DATEINSCRIPTION = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $DESCRIPTION = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCode(): ?int
    {
        return $this->code;
    }

    public function setCode(int $code): self
    {
        $this->code = $code;

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

    public function getDATEINSCRIPTION(): ?\DateTimeInterface
    {
        return $this->DATEINSCRIPTION;
    }

    public function setDATEINSCRIPTION(?\DateTimeInterface $DATEINSCRIPTION): self
    {
        $this->DATEINSCRIPTION = $DATEINSCRIPTION;

        return $this;
    }

    public function getDESCRIPTION(): ?string
    {
        return $this->DESCRIPTION;
    }

    public function setDESCRIPTION(?string $DESCRIPTION): self
    {
        $this->DESCRIPTION = $DESCRIPTION;

        return $this;
    }
}
