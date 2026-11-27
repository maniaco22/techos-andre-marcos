<?php
declare(strict_types=1);

namespace TechOS\Strategies;

use DomainException;
use TechOS\Models\OrdemServico;

/**
 * Padrão Strategy (Máquina de Estados): valida transições permitidas no ciclo de vida da OS.
 */
class StatusOSStrategy
{
    private const TRANSICOES_PERMITIDAS = [
        OrdemServico::STATUS_ABERTA       => [OrdemServico::STATUS_EM_ANDAMENTO, OrdemServico::STATUS_CONCLUIDA],
        OrdemServico::STATUS_EM_ANDAMENTO => [OrdemServico::STATUS_CONCLUIDA],
        OrdemServico::STATUS_CONCLUIDA    => [],
    ];

    public static function transicionar(OrdemServico $os, string $novoStatus, float $valorServico = 0.0): void
    {
        $statusAtual = $os->getStatus();
        $novoStatus  = strtoupper(trim($novoStatus));

        if (!isset(self::TRANSICOES_PERMITIDAS[$statusAtual]) ||
            !in_array($novoStatus, self::TRANSICOES_PERMITIDAS[$statusAtual], true)) {
            throw new DomainException("Transição de status inválida: {$statusAtual} -> {$novoStatus}.");
        }

        if ($novoStatus === OrdemServico::STATUS_CONCLUIDA && $valorServico <= 0.0 && $os->getValorServico() <= 0.0) {
            throw new DomainException('Informe um valor de serviço maior que zero para concluir a OS.');
        }

        $os->alterarStatus($novoStatus, $valorServico);
    }
}
