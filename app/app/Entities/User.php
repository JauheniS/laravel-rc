<?php

declare(strict_types=1);

namespace App\Entities;

use Cycle\Annotated\Annotation\Column;
use Cycle\Annotated\Annotation\Entity;
use Cycle\Annotated\Annotation\Table\Index;
use Cycle\ORM\Entity\Behavior\CreatedAt;
use Cycle\ORM\Entity\Behavior\UpdatedAt;
use DateTimeImmutable;

#[Entity]
#[Index(['created_at'])]
#[Index(['updated_at'])]
#[UpdatedAt(field: 'updatedAt', column: 'updated_at', nullable: true)]
#[CreatedAt(field: 'createdAt', column: 'created_at')]
class User
{
    #[Column(type: 'bigPrimary')]
    protected int $id;

    #[Column(type: 'string', length: 255)]
    protected string $login;

    #[Column(type: 'string', nullable: true, length: 255)]
    protected ?string $password = null;

    protected DateTimeImmutable $createdAt;

    public function __construct(
        protected ?DateTimeImmutable $updatedAt = null,
    ) {}

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): static
    {
        $this->id = $id;
        return $this;
    }

    public function getLogin(): string
    {
        return $this->login;
    }

    public function setLogin(string $login): static
    {
        $this->login = $login;
        return $this;
    }

    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function setPassword(?string $password): static
    {
        $this->password = $password;
        return $this;
    }

    public function getCreatedAt(): DateTimeImmutable
    {
        return $this->createdAt;
    }

    public function setCreatedAt(DateTimeImmutable $createdAt): static
    {
        $this->createdAt = $createdAt;
        return $this;
    }

    public function getUpdatedAt(): ?DateTimeImmutable
    {
        return $this->updatedAt;
    }

    public function setUpdatedAt(?DateTimeImmutable $updatedAt): static
    {
        $this->updatedAt = $updatedAt;
        return $this;
    }
}
