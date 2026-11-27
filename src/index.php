<?php
declare(strict_types=1);
require_once __DIR__ . '/autoload.php';

use TechOS\Controllers\{AuthController, ClienteController, EquipamentoController, OrdemServicoController, Response};
use TechOS\Middlewares\AuthMiddleware;

header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Headers: Content-Type, Authorization');
header('Access-Control-Allow-Methods: GET, POST, PATCH, OPTIONS');
if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') { http_response_code(204); exit; }

$rota = trim((string) ($_GET['rota'] ?? ''), '/');
$metodo = $_SERVER['REQUEST_METHOD'];
$raw = file_get_contents('php://input');
$body = $raw ? (json_decode($raw, true) ?: []) : [];

if ($rota === '' || $rota === 'health') Response::json(['status' => 'online', 'sistema' => 'TechOS API v1.0'], 200);
if ($rota === 'login' && $metodo === 'POST') AuthController::login($body);

AuthMiddleware::verificar();

match (true) {
    $rota === 'clientes' && $metodo === 'GET'      => ClienteController::listar(),
    $rota === 'clientes' && $metodo === 'POST'     => ClienteController::criar($body),
    $rota === 'equipamentos' && $metodo === 'GET'  => EquipamentoController::listar(),
    $rota === 'equipamentos' && $metodo === 'POST' => EquipamentoController::criar($body),
    $rota === 'os' && $metodo === 'GET'            => OrdemServicoController::listar(),
    $rota === 'os' && $metodo === 'POST'           => OrdemServicoController::criar($body),
    $rota === 'os/status' && $metodo === 'PATCH'   => OrdemServicoController::atualizarStatus($body),
    default => Response::json(['erro' => 'Endpoint não encontrado.'], 404),
};