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
    private ?Participant $PARTICIPANTS = null;

    #[ORM\ManyToOne(targetEntity:Hackathon::class)]
    #[ORM\JoinColumn(name: 'IDHACKATHON', referencedColumnName:'IDHACKATHON')]
    private ?Hackathon $HACKATHONS = null;

    #[ORM\Column(type: Types::DATE_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $DATEINSCRIPTION = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $DESCRIPTION = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPARTICIPANTS(): ?Participant
    {
        return $this->PARTICIPANTS;
    }

    public function setPARTICIPANTS(Participant $PARTICIPANTS): self
    {
        $this->PARTICIPANTS = $PARTICIPANTS;

        return $this;
    }

    public function getHACKATHONS(): ?Hackathon
    {
        return $this->HACKATHONS;
    }

    public function setHACKATHONS(Hackathon $HACKATHONS): self
    {
        $this->HACKATHONS = $HACKATHONS;

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
