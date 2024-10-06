<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use ApiPlatform\Metadata\Delete;
use ApiPlatform\Metadata\Get;
use ApiPlatform\Metadata\GetCollection;
use ApiPlatform\Metadata\Patch;
use ApiPlatform\Metadata\Post;
use ApiPlatform\Metadata\Put;
use App\Repository\MotoRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;


#[ORM\Entity(repositoryClass: MotoRepository::class)]
#[ORM\HasLifecycleCallbacks]
#[ApiResource(
    operations: [
        new Put(),
        new GetCollection(),
        new Get(),
        new Post(),
        new Patch(),
        new Delete()
    ]
)]

class Moto
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: 'string', length: 50, nullable: false)]
    #[Assert\NotNull]
    #[Assert\Length(max: 50)]
    private string $modelo;

    #[ORM\Column(type: 'integer', nullable: false)]
    #[Assert\NotNull]
    #[Assert\Positive]
    private int $cilindrada;

    #[ORM\Column(type: 'string', length: 40, nullable: false)]
    #[Assert\NotNull]
    #[Assert\Length(max: 40)]
    private string $marca;

    #[ORM\Column(type: 'string', length: 255, nullable: false)]
    #[Assert\NotNull]
    #[Assert\Length(max: 40)]
    private string $tipo;

    #[ORM\Column(type: Types::JSON, nullable: true)]
    #[Assert\Count(
        max: 20,
        maxMessage: "El campo extras no puede tener más de {{ limit }} elementos.",
        groups: ['Default']
    )]
    private ?array $extras = [];

    #[ORM\Column(type: 'integer', nullable: true)]
    private ?int $peso = null;

    #[ORM\Column]
    private \DateTimeImmutable $createdAt;

    #[ORM\Column]
    private \DateTimeImmutable $updatedAt;

    #[ORM\Column(type: Types::BOOLEAN, nullable: false)]
    #[Assert\NotNull]
    private bool $edicionLimitada = false;
    

    public function getId(): int
    {
        return $this->id;
    }

    public function getModelo(): string
    {
        return $this->modelo;
    }

    public function setModelo(string $modelo): static
    {
        $this->modelo = $modelo;

        return $this;
    }

    public function getCilindrada(): int
    {
        return $this->cilindrada;
    }

    public function setCilindrada(int $cilindrada): static
    {
        $this->cilindrada = $cilindrada;

        return $this;
    }

    public function getMarca(): string
    {
        return $this->marca;
    }

    public function setMarca(string $marca): static
    {
        $this->marca = $marca;

        return $this;
    }

    public function getTipo(): string
    {
        return $this->tipo;
    }

    public function setTipo(string $tipo): static
    {
        $this->tipo = $tipo;

        return $this;
    }

    public function getExtras(): ?array
    {
        return $this->extras;
    }

    public function setExtras(?array $extras): static
    {
        $this->extras = $extras;

        return $this;
    }

    public function getPeso(): ?int
    {
        return $this->peso;
    }

    public function setPeso(?int $peso): static
    {
        $this->peso = $peso;

        return $this;
    }

    public function getCreatedAt(): \DateTimeImmutable
    {
        return $this->createdAt;
    }

    public function setCreatedAt(\DateTimeImmutable $createdAt): static
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    public function getUpdatedAt(): \DateTimeImmutable
    {
        return $this->updatedAt;
    }

    public function setUpdatedAt(\DateTimeImmutable $updatedAt): static
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }

    public function isEdicionLimitada(): bool
    {
        return $this->edicionLimitada;
    }

    public function setEdicionLimitada(bool $edicionLimitada): static
    {
        $this->edicionLimitada = $edicionLimitada;

        return $this;
    }

    public function __construct()
    {
        $this->createdAt = new \DateTimeImmutable();
        $this->updatedAt = new \DateTimeImmutable();

        $this->edicionLimitada = false;
    }

    #[ORM\PreUpdate]
    public function updateTimestamp(): void
    {
        $this->updatedAt = new \DateTimeImmutable();
    }
}
