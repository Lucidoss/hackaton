<?php

namespace App\Entity;

use App\Repository\FavorisRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: FavorisRepository::class)]
#[ORM\Table(name:'favoris')]
class Favoris
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(name:'IDFAVORIS')]
    private ?int $IDFAVORIS = null;

    #[ORM\ManyToOne(targetEntity:Participant::class)]
    #[ORM\JoinColumn(name: 'IDPARTICIPANT', referencedColumnName:'IDPARTICIPANT')]
    private ?Participant $IDPARTICIPANT = null;

    #[ORM\ManyToOne(targetEntity:Hackathon::class)]
    #[ORM\JoinColumn(name: 'IDHACKATHON', referencedColumnName:'IDHACKATHON')]
    private ?Hackathon $IDHACKATHON = null;

    public function getIDFAVORIS(): ?int
    {
        return $this->IDFAVORIS;
    }

    public function setIDFAVORIS(int $IDFAVORIS): self
    {
        $this->IDFAVORIS = $IDFAVORIS;

        return $this;
    }

    public function getPARTICIPANT(): ?Participant
    {
        return $this->IDPARTICIPANT;
    }

    public function setPARTICIPANT(Participant $IDPARTICIPANT): self
    {
        $this->IDPARTICIPANT = $IDPARTICIPANT;

        return $this;
    }

    public function getHACKATHON(): ?Hackathon
    {
        return $this->IDHACKATHON;
    }

    public function setHACKATHON(Hackathon $IDHACKATHON): self
    {
        $this->IDHACKATHON = $IDHACKATHON;

        return $this;
    }
}
