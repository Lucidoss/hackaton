<?php

namespace App\Entity;

use App\Repository\AtelierRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AtelierRepository::class)]
#[ORM\Table(name:'atelier')]
class Atelier extends Evenement
{
    #[ORM\Column]
    private ?int $NBPARTICIPANTS = null;

    public function getNBPARTICIPANTS(): ?int
    {
        return $this->NBPARTICIPANTS;
    }

    public function setNBPARTICIPANTS(int $NBPARTICIPANTS): self
    {
        $this->NBPARTICIPANTS = $NBPARTICIPANTS;

        return $this;
    }
}
