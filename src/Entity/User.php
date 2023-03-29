<?php

namespace App\Entity;

use App\Repository\UserRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: UserRepository::class)]
class User
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer', nullable: false)]
    private int $idUser;

    #[ORM\Column(type: 'string', length: 120, nullable: false)]
    private string $name;

    #[ORM\Column(type: 'string', length: 120, nullable: false)]
    private string $lastname;

    #[ORM\Column(type: 'string', length: 120, nullable: false)]
    private string $email;

    #[ORM\Column(type: 'string', length: 120, nullable: false)]
    private string $password;

    #[ORM\Column(type: 'integer', nullable: false)]
    private int $status;

    public function getId(): int
    {
        return $this->idUser;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getLastName(): string
    {
        return $this->lastname;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function getPassword(): string
    {
        return $this->password;
    }

    public function getStatus(): int
    {
        return $this->status;
    }

    public function getIdUser(): ?int
    {
        return $this->idUser;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function setLastname(string $lastname): self
    {
        $this->lastname = $lastname;

        return $this;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    public function setStatus(int $status): self
    {
        $this->status = $status;

        return $this;
    }
}
