<?php
final class Database {
    public static function connection(): PDO {
        static $pdo;
        if ($pdo) return $pdo;
        $env = is_file(__DIR__.'/../.env') ? parse_ini_file(__DIR__.'/../.env') : [];
        if (!empty($env['DATABASE_URL'])) {
            $url = parse_url($env['DATABASE_URL']);
            $host = $url['host'] ?? '127.0.0.1'; $port = $url['port'] ?? 3306;
            $name = ltrim($url['path'] ?? '/natillera', '/'); $user = urldecode($url['user'] ?? 'root'); $password = urldecode($url['pass'] ?? '');
        } else { $host=$env['DB_HOST']??'127.0.0.1'; $port=$env['DB_PORT']??'3306'; $name=$env['DB_NAME']??'natillera'; $user=$env['DB_USER']??'root'; $password=$env['DB_PASSWORD']??''; }
        $dsn = "mysql:host={$host};port={$port};dbname={$name};charset=utf8mb4";
        return $pdo = new PDO($dsn, $user, $password, [PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION, PDO::ATTR_DEFAULT_FETCH_MODE=>PDO::FETCH_ASSOC]);
    }
}
