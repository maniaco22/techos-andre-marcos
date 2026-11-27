<?php
declare(strict_types=1);
namespace TechOS\Middlewares;
use TechOS\Config\JwtHelper;
use TechOS\Controllers\Response;

class AuthMiddleware
{
    public static function verificar(): array
    {
        $hdr = $_SERVER['HTTP_AUTHORIZATION'] ?? '';
        if (empty($hdr) && function_exists('apache_request_headers')) {
            $h = apache_request_headers();
            $hdr = $h['Authorization'] ?? $h['authorization'] ?? '';
        }
        if (!preg_match('/Bearer\s(\S+)/', $hdr, $m)) {
            Response::json(['erro' => 'Token não informado.'], 401);
        }
        $payload = JwtHelper::validarToken($m[1]);
        if (!$payload) {
            Response::json(['erro' => 'Token inválido ou expirado.'], 401);
        }
        return $payload;
    }
}