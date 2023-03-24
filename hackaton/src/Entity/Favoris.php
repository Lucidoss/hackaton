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
    private ?Participant $PARTICIPANTS = null;

    #[ORM\ManyToOne(targetEntity:Hackathon::class)]
    #[ORM\JoinColumn(name: 'IDHACKATHON', referencedColumnName:'IDHACKATHON')]
    private ?Hackathon $HACKATHONS = null;

    public function getIDFAVORIS(): ?int
    {
        return $this->IDFAVORIS;
    }

    public function setIDFAVORIS(int $IDFAVORIS): self
    {
        $this->IDFAVORIS = $IDFAVORIS;

        return $this;
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
}
