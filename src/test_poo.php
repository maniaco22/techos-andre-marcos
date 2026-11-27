<?php
declare(strict_types=1);

require_once __DIR__ . '/autoload.php';

use TechOS\Factories\OrdemServicoFactory;
use TechOS\Strategies\StatusOSStrategy;
use TechOS\Models\Cliente;
use TechOS\Models\Equipamento;

$cliente = new Cliente('Carlos Almeida', '(81) 99988-7766', 'carlos@email.com', 1);
$equipamento = new Equipamento(1, 'Notebook Dell Inspiron 15', 'SN-DELL-9981', 1);
$os = OrdemServicoFactory::criarNova($cliente->getId(), $equipamento->getId(), 'Nao liga apos queda de energia');

echo "OS criada: {$os->getProtocolo()} | Status inicial: {$os->getStatus()}\n";

StatusOSStrategy::transicionar($os, 'EM_ANDAMENTO');
echo "Status atualizado: {$os->getStatus()}\n";

StatusOSStrategy::transicionar($os, 'CONCLUIDA', 180.00);
echo "Status final: {$os->getStatus()} | Valor: R$ " . number_format($os->getValorServico(), 2, ',', '.') . "\n";
