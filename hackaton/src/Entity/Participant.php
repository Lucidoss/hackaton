<?php

namespace App\Entity;

use App\Repository\ParticipantRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface;
use Symfony\Component\Security\Core\User\UserInterface;
use Doctrine\DBAL\Types\Types;

#[ORM\Entity(repositoryClass: ParticipantRepository::class)]
#[ORM\Table(name:'participant')]
class Participant implements UserInterface, PasswordAuthenticatedUserInterface
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(name:'IDPARTICIPANT')]
    private ?int $id = null;

    #[ORM\Column(name:'ROLES', type:"json")]
    private array $roles = ["ROLE_USER"];

    #[ORM\Column(length: 32)]
    private ?string $NOM = null;

    #[ORM\Column(length: 32)]
    private ?string $PRENOM = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $DATENAISSANCE = null;

    #[ORM\Column(length: 64)]
    private ?string $VILLE = null;

    #[ORM\Column(length: 128)]
    private ?string $RUE = null;

    #[ORM\Column(length: 5)]
    private ?string $CP = null;

    #[ORM\Column(length: 32)]
    private ?string $EMAIL = null;

    #[ORM\Column(length: 32)]
    private ?string $LOGIN = null;

    #[ORM\Column(length: 255)]
    private ?string $MDP = null;

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

    public function getDATENAISSANCE(): ?\DateTimeInterface
    {
        return $this->DATENAISSANCE;
    }

    public function setDATENAISSANCE(\DateTimeInterface $DATENAISSANCE): self
    {
        $this->DATENAISSANCE = $DATENAISSANCE;

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

    public function getRUE(): ?string
    {
        return $this->RUE;
    }

    public function setRUE(string $RUE): self
    {
        $this->RUE = $RUE;

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

    public function getEMAIL(): ?string
    {
        return $this->EMAIL;
    }

    public function setEMAIL(string $EMAIL): self
    {
        $this->EMAIL = $EMAIL;

        return $this;
    }

    public function getLOGIN(): ?string
    {
        return $this->LOGIN;
    }

    public function setLOGIN(string $LOGIN): self
    {
        $this->LOGIN = $LOGIN;

        return $this;
    }

    public function getMDP(): ?string
    {
        return $this->MDP;
    }

    public function setMDP(string $MDP): self
    {
        $this->MDP = $MDP;

        return $this;
    }

     /**
     * A visual identifier that represents this user.
     *
     * @see UserInterface
     */
    public function getUserIdentifier(): string
    {
        return (string) $this->NOM . " " . $this->PRENOM;
    }

    /**
     * @see UserInterface
     */
    public function getRoles(): array
    {
        $roles = $this->roles;
        // guarantee every user at least has ROLE_USER
        $roles[] = 'ROLE_USER';

        return array_unique($roles);
    }

    public function setRoles(array $roles): self
    {
        $this->roles = $roles;

        return $this;
    }

    /**
     * @see PasswordAuthenticatedUserInterface
     */
    public function getPassword(): string
    {
        return $this->MDP;
    }

    public function setPassword(string $MDP): self
    {
        $this->MDP = $MDP;

        return $this;
    }

    /**
     * @see UserInterface
     */
    public function eraseCredentials()
    {
        // If you store any temporary, sensitive data on the user, clear it here
        // $this->plainPassword = null;
    }

    // public function addParticipant(Participant $participants): self
    // {
    //     if (!$this->participants->contains($participants)) {
    //         $this->participants->add($participants);
    //         $participants->addParticipant($this);
    //     }

    //     return $this;
    // }
}
