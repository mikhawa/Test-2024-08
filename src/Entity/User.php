<?php

namespace App\Entity;

use App\Repository\UserRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: UserRepository::class)]
#[ORM\Table(name: '`user`')]
class User
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(
        type: Types::INTEGER,
        options: ['unsigned' => true]
    )]
    private ?int $id = null;

    #[ORM\Column(
        type: Types::STRING,
        length: 150,
        unique: true,
    )]
    private ?string $email = null;

    #[ORM\Column(
        type: Types::DATETIME_MUTABLE,
        options: ['default' => 'CURRENT_TIMESTAMP'],
    )]
    private ?\DateTimeInterface $dateInscrition = null;

    #[ORM\Column(length: 255)]
    private ?string $key = null;

    #[ORM\Column(
        nullable: true,
        options: ['default' => 0]
    )]
    private ?bool $active = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): static
    {
        $this->email = $email;

        return $this;
    }

    public function getDateInscrition(): ?\DateTimeInterface
    {
        return $this->dateInscrition;
    }

    public function setDateInscrition(\DateTimeInterface $dateInscrition): static
    {
        $this->dateInscrition = $dateInscrition;

        return $this;
    }

    public function getKey(): ?string
    {
        return $this->key;
    }

    public function setKey(string $key): static
    {
        $this->key = $key;

        return $this;
    }

    public function isActive(): ?bool
    {
        return $this->active;
    }

    public function setActive(?bool $active): static
    {
        $this->active = $active;

        return $this;
    }
}
