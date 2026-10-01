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

    public static function error(string $message, int $status = 400, array $errors = []): never {
        $payload = [
            'status'  => 'error',
            'message' => $message,
        ];

        // Only append 'errors' if errors were provided
        if (!empty($errors)) {
            $payload['errors'] = $errors;
        }

        // Delegate to our own json() method
        self::json($payload, $status);
    }
    
    public static function success(mixed $data = null, string $message = 'success', int $status = 200): never {
        $payload = [
            'status' => 'success',
            'message' => $message,
        ];

        if($data !== null)  {
            $payload['data'] = $data;
        }

        self::json($payload, $status);
    }
 }