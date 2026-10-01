<?php
declare(strict_types=1);

namespace EliteFort\Http;


class Response {
    public static function json(array $data, int $status = 200): never {
        
        http_response_code($status);

        header('Content-Type: application/json; charset=UTF-8');

        header('Cache-Control: no-cache, no-store, must-revalidate');

        echo json_encode($data, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);

        exit;
    }
}