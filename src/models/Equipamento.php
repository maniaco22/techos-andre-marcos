<?php
declare(strict_types=1);

namespace TechOS\Models;

use InvalidArgumentException;

class Equipamento
{
    private ?int $id;
    private int $clienteId;
    private string $modelo;
    private string $numeroSerie;

    public function __construct(int $clienteId, string $modelo, string $numeroSerie, ?int $id = null)
    {
        if ($clienteId <= 0) {
            throw new InvalidArgumentException('Equipamento deve estar vinculado a um cliente válido.');
        }
        $this->id = $id;
        $this->clienteId = $clienteId;
        $this->setModelo($modelo);
        $this->setNumeroSerie($numeroSerie);
    }

    public function getId(): ?int { return $this->id; }
    public function getClienteId(): int { return $this->clienteId; }
    public function getModelo(): string { return $this->modelo; }
    public function getNumeroSerie(): string { return $this->numeroSerie; }

    public function setModelo(string $modelo): void
    {
        if (strlen(trim($modelo)) < 2) {
            throw new InvalidArgumentException('Modelo do equipamento é obrigatório.');
        }
        $this->modelo = trim($modelo);
    }

    public function setNumeroSerie(string $numeroSerie): void
    {
        if (strlen(trim($numeroSerie)) < 3) {
            throw new InvalidArgumentException('Número de série inválido.');
        }
        $this->numeroSerie = strtoupper(trim($numeroSerie));
    }
}
