<?php
declare(strict_types=1);

namespace TechOS\Models;

use InvalidArgumentException;

class Cliente
{
    private ?int $id;
    private string $nome;
    private string $telefone;
    private ?string $email;

    public function __construct(string $nome, string $telefone, ?string $email = null, ?int $id = null)
    {
        $this->id = $id;
        $this->setNome($nome);
        $this->setTelefone($telefone);
        $this->email = $email ? strtolower(trim($email)) : null;
    }

    public function getId(): ?int { return $this->id; }
    public function getNome(): string { return $this->nome; }
    public function getTelefone(): string { return $this->telefone; }
    public function getEmail(): ?string { return $this->email; }

    public function setNome(string $nome): void
    {
        if (strlen(trim($nome)) < 3) {
            throw new InvalidArgumentException('O nome do cliente deve ter no mínimo 3 caracteres.');
        }
        $this->nome = trim($nome);
    }

    public function setTelefone(string $telefone): void
    {
        $digitos = preg_replace('/\D/', '', $telefone);
        if (strlen($digitos) < 10 || strlen($digitos) > 11) {
            throw new InvalidArgumentException('Telefone inválido. Informe DDD + número (10 ou 11 dígitos).');
        }
        $this->telefone = trim($telefone);
    }
}
