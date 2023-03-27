<?php

namespace App\Entity;

use App\Repository\CommentaireAtelierRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CommentaireAtelierRepository::class)]
#[ORM\Table(name:'commentaire_atelier')]
class CommentaireAtelier
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(name:'IDCOMMENTAIRE')]
    private ?int $id = null;

    #[ORM\Column(length: 32)]
    private ?string $EMAIL = null;

    #[ORM\Column(length: 255)]
    private ?string $COMMENTAIRE = null;

    #[ORM\ManyToOne(targetEntity:Atelier::class)]
    #[ORM\JoinColumn(name: 'IDATELIER', referencedColumnName:'IDEVENEMENT')]
    private ?Atelier $ATELIERS = null;
    public function getId(): ?int
    {
        return $this->id;
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

    public function getCOMMENTAIRE(): ?string
    {
        return $this->COMMENTAIRE;
    }

    public function setCOMMENTAIRE(string $COMMENTAIRE): self
    {
        $this->COMMENTAIRE = $COMMENTAIRE;

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
