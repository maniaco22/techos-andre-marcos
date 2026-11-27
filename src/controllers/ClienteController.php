<?php
declare(strict_types=1);
namespace TechOS\Controllers;
use InvalidArgumentException;
use TechOS\Config\Database;
use TechOS\Models\Cliente;

class ClienteController
{
    public static function listar(): void
    {
        $pdo = Database::getConnection();
        $stmt = $pdo->query('SELECT id, nome, telefone, email, criado_em FROM clientes ORDER BY nome ASC');
        Response::json(['dados' => $stmt->fetchAll()], 200);
    }
    public static function criar(array $body): void
    {
        try {
            $c = new Cliente((string) ($body['nome'] ?? ''), (string) ($body['telefone'] ?? ''), !empty($body['email']) ? (string) $body['email'] : null);
            $pdo = Database::getConnection();
            $stmt = $pdo->prepare('INSERT INTO clientes (nome, telefone, email) VALUES (:nome, :telefone, :email)');
            $stmt->execute([':nome' => $c->getNome(), ':telefone' => $c->getTelefone(), ':email' => $c->getEmail()]);
            Response::json(['mensagem' => 'Cliente cadastrado.', 'id' => (int) $pdo->lastInsertId()], 201);
        } catch (InvalidArgumentException $e) {
            Response::json(['erro' => $e->getMessage()], 400);
        }
    }
}