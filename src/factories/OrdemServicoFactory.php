<?php
declare(strict_types=1);

namespace TechOS\Factories;

use TechOS\Models\OrdemServico;

/**
 * Padrão Factory: centraliza a criação de Ordens de Serviço com protocolo único.
 */
class OrdemServicoFactory
{
    public static function criarNova(int $clienteId, int $equipamentoId, string $defeitoRelatado): OrdemServico
    {
        $protocolo = sprintf('OS-%s-%04d', date('Y'), random_int(1000, 9999));

        return new OrdemServico(
            $protocolo,
            $clienteId,
            $equipamentoId,
            $defeitoRelatado,
            OrdemServico::STATUS_ABERTA,
            0.0
        );
    }
}
