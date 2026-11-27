<?php
declare(strict_types=1);
namespace TechOS\Controllers;
use TechOS\Config\Database;
use TechOS\Config\JwtHelper;

class AuthController
{
    public static function login(array $body): void
    {
        $email = strtolower(trim((string) ($body['email'] ?? '')));
        $senha = (string) ($body['senha'] ?? '');
        if ($email === '' || $senha === '') {
            Response::json(['erro' => 'Informe e-mail e senha.'], 400);
        }
        $pdo = Database::getConnection();
        $stmt = $pdo->prepare('SELECT id, nome, email, senha_hash, perfil FROM usuarios WHERE email = :email LIMIT 1');
        $stmt->execute([':email' => $email]);
        $u = $stmt->fetch();
        if (!$u || !password_verify($senha, $u['senha_hash'])) {
            Response::json(['erro' => 'Credenciais inválidas.'], 401);
        }
        $token = JwtHelper::gerarToken(['sub' => (int) $u['id'], 'nome' => $u['nome'], 'perfil' => $u['perfil']]);
        Response::json([
            'token' => $token,
            'usuario' => ['id' => (int) $u['id'], 'nome' => $u['nome'], 'email' => $u['email'], 'perfil' => $u['perfil']]
        ], 200);
    }
}