<?php

class Compte {
    private ?int $id = null;
    private ?string $login = null;
    private ?string $password = null;
    private ?string $role = null;

    // Getters
    public function getId(): ?int {
        return $this->id;
    }

    public function getLogin(): ?string {
        return $this->login;
    }

    public function getPassword(): ?string {
        return $this->password;
    }

    public function getRole(): ?string {
        return $this->role;
    }

    // Setters
    public function setId(int $id): void {
        $this->id = $id;
    }

    public function setLogin(string $login): void {
        $this->login = $login;
    }

    public function setPassword(string $password): void {
        $this->password = $password;
    }

    public function setRole(string $role): void {
        $this->role = $role;
    }


    public static function fromArray(array $data): self {
        $compte = new self();
        $compte->setId($data['id'] ?? null);
        $compte->setLogin($data['login'] ?? null);
        $compte->setPassword($data['password'] ?? null); // Sera le hachage
        $compte->setRole($data['role'] ?? null);
        return $compte;
    }

    public function toArray(): array {
        return [
            'id' => $this->id,
            'login' => $this->login,
            'role' => $this->role,

        ];
    }
}