<?php
declare(strict_types=1);

namespace TechOS\Models;

use InvalidArgumentException;

class Usuario
{
    private ?int $id;
    private string $nome;
    private string $email;
    private string $senhaHash;
    private string $perfil;

    public const PERFIS_VALIDOS = ['ADMIN', 'ATENDENTE', 'TECNICO'];

    public function __construct(
        string $nome,
        string $email,
        string $senhaHash,
        string $perfil = 'ATENDENTE',
        ?int $id = null
    ) {
        $this->id = $id;
        $this->setNome($nome);
        $this->setEmail($email);
        $this->senhaHash = $senhaHash;
        $this->setPerfil($perfil);
    }

    public function getId(): ?int { return $this->id; }
    public function getNome(): string { return $this->nome; }
    public function getEmail(): string { return $this->email; }
    public function getSenhaHash(): string { return $this->senhaHash; }
    public function getPerfil(): string { return $this->perfil; }

    public function setNome(string $nome): void
    {
        $nomeLimpo = trim($nome);
        if (strlen($nomeLimpo) < 3) {
            throw new InvalidArgumentException('O nome do usuário deve ter pelo menos 3 caracteres.');
        }
        $this->nome = $nomeLimpo;
    }

    public function setEmail(string $email): void
    {
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            throw new InvalidArgumentException('E-mail inválido.');
        }
        $this->email = strtolower(trim($email));
    }

    public function setPerfil(string $perfil): void
    {
        $perfilUpper = strtoupper(trim($perfil));
        if (!in_array($perfilUpper, self::PERFIS_VALIDOS, true)) {
            throw new InvalidArgumentException('Perfil de acesso inválido.');
        }
        $this->perfil = $perfilUpper;
    }

    public function verificarSenha(string $senhaPura): bool
    {
        return password_verify($senhaPura, $this->senhaHash);
    }
}
