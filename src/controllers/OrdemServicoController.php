<?php
declare(strict_types=1);
namespace TechOS\Controllers;

use DomainException;
use InvalidArgumentException;
use Throwable;
use TechOS\Config\Database;
use TechOS\Factories\OrdemServicoFactory;
use TechOS\Models\OrdemServico;
use TechOS\Strategies\StatusOSStrategy;

class OrdemServicoController
{
    public static function listar(): void
    {
        $pdo = Database::getConnection();
        $sql = 'SELECT os.id, os.protocolo, os.cliente_id, c.nome AS cliente_nome, c.telefone AS cliente_telefone,
                       os.equipamento_id, e.modelo AS equipamento_modelo, e.numero_serie,
                       os.defeito_relatado, os.status, os.valor_servico, os.criado_em
                FROM ordens_servico os
                INNER JOIN clientes c ON c.id = os.cliente_id
                INNER JOIN equipamentos e ON e.id = os.equipamento_id
                ORDER BY os.id DESC';
        $lista = $pdo->query($sql)->fetchAll();

        $ind = ['abertas' => 0, 'em_andamento' => 0, 'concluidas' => 0, 'faturamento_total' => 0.0];
        foreach ($lista as $item) {
            if ($item['status'] === 'ABERTA') $ind['abertas']++;
            elseif ($item['status'] === 'EM_ANDAMENTO') $ind['em_andamento']++;
            elseif ($item['status'] === 'CONCLUIDA') {
                $ind['concluidas']++;
                $ind['faturamento_total'] += (float) $item['valor_servico'];
            }
        }
        Response::json(['indicadores' => $ind, 'dados' => $lista], 200);
    }

    public static function criar(array $body): void
    {
        try {
            $os = OrdemServicoFactory::criarNova((int) ($body['cliente_id'] ?? 0), (int) ($body['equipamento_id'] ?? 0), (string) ($body['defeito_relatado'] ?? ''));
            $pdo = Database::getConnection();
            $stmt = $pdo->prepare('INSERT INTO ordens_servico (protocolo, cliente_id, equipamento_id, defeito_relatado, status, valor_servico) VALUES (:p, :c, :e, :d, :s, :v)');
            $stmt->execute([
                ':p' => $os->getProtocolo(), ':c' => $os->getClienteId(), ':e' => $os->getEquipamentoId(),
                ':d' => $os->getDefeitoRelatado(), ':s' => $os->getStatus(), ':v' => $os->getValorServico()
            ]);
            Response::json(['mensagem' => 'OS aberta.', 'id' => (int) $pdo->lastInsertId(), 'protocolo' => $os->getProtocolo()], 201);
        } catch (InvalidArgumentException $e) {
            Response::json(['erro' => $e->getMessage()], 400);
        }
    }

    public static function atualizarStatus(array $body): void
    {
        $id = (int) ($body['id'] ?? 0);
        $status = (string) ($body['status'] ?? '');
        $valor = (float) ($body['valor_servico'] ?? 0.0);
        if ($id <= 0 || $status === '') Response::json(['erro' => 'Informe ID e status.'], 400);

        $pdo = Database::getConnection();
        try {
            $pdo->beginTransaction();
            $stmt = $pdo->prepare('SELECT * FROM ordens_servico WHERE id = :id FOR UPDATE');
            $stmt->execute([':id' => $id]);
            $row = $stmt->fetch();
            if (!$row) {
                $pdo->rollBack();
                Response::json(['erro' => 'OS não encontrada.'], 404);
            }
            $os = new OrdemServico($row['protocolo'], (int) $row['cliente_id'], (int) $row['equipamento_id'], $row['defeito_relatado'], $row['status'], (float) $row['valor_servico'], (int) $row['id']);
            StatusOSStrategy::transicionar($os, $status, $valor);
            $upd = $pdo->prepare('UPDATE ordens_servico SET status = :s, valor_servico = :v WHERE id = :id');
            $upd->execute([':s' => $os->getStatus(), ':v' => $os->getValorServico(), ':id' => $os->getId()]);
            $pdo->commit();
            Response::json(['mensagem' => 'Status atualizado.', 'status' => $os->getStatus(), 'valor' => $os->getValorServico()], 200);
        } catch (DomainException | InvalidArgumentException $e) {
            if ($pdo->inTransaction()) $pdo->rollBack();
            Response::json(['erro' => $e->getMessage()], 400);
        } catch (Throwable $e) {
            if ($pdo->inTransaction()) $pdo->rollBack();
            Response::json(['erro' => 'Erro transacional.'], 500);
        }
    }
}