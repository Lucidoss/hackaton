<?php

namespace App\Entity;

use App\Repository\InscriptionRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: InscriptionRepository::class)]
#[ORM\Table(name:'inscription')]
class Inscription
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(name:'CODE')]
    private ?int $id = null;

    #[ORM\ManyToOne(targetEntity:Participant::class)]
    #[ORM\JoinColumn(name: 'IDPARTICIPANT', referencedColumnName:'IDPARTICIPANT')]
    private ?Participant $PARTICIPANT = null;

    #[ORM\ManyToOne(targetEntity:Hackathon::class)]
    #[ORM\JoinColumn(name: 'IDHACKATHON', referencedColumnName:'IDHACKATHON')]
    private ?Hackathon $HACKATHON = null;

    #[ORM\Column(type: Types::DATE_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $DATEINSCRIPTION = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $DESCRIPTION = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPARTICIPANT(): ?Participant
    {
        return $this->PARTICIPANT;
    }

    public function setPARTICIPANT(Participant $PARTICIPANT): self
    {
        $this->PARTICIPANT = $PARTICIPANT;

        return $this;
    }

    public function getHACKATHON(): ?Hackathon
    {
        return $this->HACKATHON;
    }

    public function setHACKATHON(Hackathon $HACKATHON): self
    {
        $this->HACKATHON = $HACKATHON;

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
