<?php
declare(strict_types=1);
namespace TechOS\Controllers;

use InvalidArgumentException;
use PDOException;
use TechOS\Config\Database;
use TechOS\Models\Equipamento;

class EquipamentoController
{
    public static function listar(): void
    {
        $pdo = Database::getConnection();$sql = 'SELECT e.id, e.cliente_id, c.nome AS cliente_nome, e.modelo, e.numero_serie, e.criado_em
                FROM equipamentos e
                INNER JOIN clientes c ON c.id = e.cliente_id
                ORDER BY e.id DESC';
        Response::json(['dados' => $pdo->query($sql)->fetchAll()], 200);
    }

    public static function criar(array $body): void
    {
        try {
            $eq = new Equipamento((int) ($body['cliente_id'] ?? 0), (string) ($body['modelo'] ?? ''), (string) ($body['numero_serie'] ?? ''));$pdo = Database::getConnection();
            $stmt =$pdo->prepare('INSERT INTO equipamentos (cliente_id, modelo, numero_serie) VALUES (:cid, :mod, :ns)');
            $stmt->execute([':cid' =>$eq->getClienteId(), ':mod' => $eq->getModelo(), ':ns' =>$eq->getNumeroSerie()]);
            Response::json(['mensagem' => 'Equipamento cadastrado.', 'id' => (int) $pdo->lastInsertId()], 201); } catch (InvalidArgumentException$e) {
            Response::json(['erro' => $e->getMessage()], 400); } catch (PDOException$e) {
            Response::json(['erro' => 'Número de série duplicado ou cliente inválido.'], 400);
        }
    }
}