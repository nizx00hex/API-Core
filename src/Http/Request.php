<?php


declare(strict_types=1);


namespace EliteFort\Http;


class Request {
    private string $method;
    private string $path;
    private array $queryParams;
    private array $body;

    public function __construct() {
        $this->method = strtoupper($_SERVER['REQUEST_URI'] ?? 'GET');

        $rawURI = $_SERVER['REQUEST_URI'] ?? '/';
        $this->path = parse_url($rawURI, PHP_URL_PATH) ?: '/';

        $this->queryParams = $_GET;
        $this->body = selff::parseJsonBody();
    }

    private static function parseJsonBody(): array {
        $rawContent = file_get_contents('php://input');

        if($rawContent === false || trim($rawContent) === '') {
            return [];
        }

        $decode = json_decode($rawContent, true);

        if(json_last_error() !== JSON_ERROR_NONE) {
            Response::error(
                'Malformed JSON payload provided',
                400
            );
        }

        return is_array($decode) ? $decode : [];
    }

    

}