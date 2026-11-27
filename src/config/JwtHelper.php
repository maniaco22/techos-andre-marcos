<?php
declare(strict_types=1);
namespace TechOS\Config;

class JwtHelper
{
    private static function getSecret(): string
    {
        return getenv('JWT_SECRET') ?: 'techos_senai_belo_jardim_2026_chave_secreta';
    }
    private static function b64UrlEncode(string $d): string
    {
        return rtrim(strtr(base64_encode($d), '+/', '-_'), '=');
    }
    private static function b64UrlDecode(string $d): string
    {
        return base64_decode(strtr($d, '-_', '+/'));
    }
    public static function gerarToken(array $payload, int $exp = 28800): string
    {
        $h = self::b64UrlEncode((string) json_encode(['alg' => 'HS256', 'typ' => 'JWT']));
        $payload['iat'] = time();
        $payload['exp'] = time() + $exp;
        $p = self::b64UrlEncode((string) json_encode($payload));
        $s = hash_hmac('sha256', "$h.$p", self::getSecret(), true);
        return "$h.$p." . self::b64UrlEncode($s);
    }
    public static function validarToken(string $token): ?array
    {
        $partes = explode('.', $token);
        if (count($partes) !== 3) return null;
        [$h, $p, $s] = $partes;
        $esp = self::b64UrlEncode(hash_hmac('sha256', "$h.$p", self::getSecret(), true));
        if (!hash_equals($esp, $s)) return null;
        $data = json_decode(self::b64UrlDecode($p), true);
        return (is_array($data) && ($data['exp'] ?? 0) >= time()) ? $data : null;
    }
}