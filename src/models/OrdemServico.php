<?php
declare(strict_types=1);

namespace TechOS\Models;

use InvalidArgumentException;

class OrdemServico
{
    private ?int $id;
    private string $protocolo;
    private int $clienteId;
    private int $equipamentoId;
    private string $defeitoRelatado;
    private string $status;
    private float $valorServico;

    public const STATUS_ABERTA       = 'ABERTA';
    public const STATUS_EM_ANDAMENTO = 'EM_ANDAMENTO';
    public const STATUS_CONCLUIDA    = 'CONCLUIDA';

    public function __construct(
        string $protocolo,
        int $clienteId,
        int $equipamentoId,
        string $defeitoRelatado,
        string $status = self::STATUS_ABERTA,
        float $valorServico = 0.0,
        ?int $id = null
    ) {
        if ($clienteId <= 0 || $equipamentoId <= 0) {
            throw new InvalidArgumentException('Cliente e Equipamento são obrigatórios na OS.');
        }
        if (strlen(trim($defeitoRelatado)) < 5) {
            throw new InvalidArgumentException('Descreva o defeito relatado com pelo menos 5 caracteres.');
        }
        $this->id = $id;
        $this->protocolo = $protocolo;
        $this->clienteId = $clienteId;
        $this->equipamentoId = $equipamentoId;
        $this->defeitoRelatado = trim($defeitoRelatado);
        $this->status = $status;
        $this->valorServico = max(0.0, $valorServico);
    }

    public function getId(): ?int { return $this->id; }
    public function getProtocolo(): string { return $this->protocolo; }
    public function getClienteId(): int { return $this->clienteId; }
    public function getEquipamentoId(): int { return $this->equipamentoId; }
    public function getDefeitoRelatado(): string { return $this->defeitoRelatado; }
    public function getStatus(): string { return $this->status; }
    public function getValorServico(): float { return $this->valorServico; }

    public function alterarStatus(string $novoStatus, float $valorServico = 0.0): void
    {
        $this->status = $novoStatus;
        if ($valorServico > 0) {
            $this->valorServico = $valorServico;
        }
    }
}
