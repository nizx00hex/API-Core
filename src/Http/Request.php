<?php


declare(strict_types=1);


namespace EliteFort\Http;


class Request {
    private string $method;
    private string $path;
    private array $queryParams;
    private array $body;

    public function __construct() {
        $this->method = strtoupper($_SERVER['REQUEST_METHOD'] ?? 'GET');

        $rawUri = $_SERVER['REQUEST_URI'] ?? '/';

        $this->path = parse_url($rawUri, PHP_URL_PATH) ?: '/';

        $this->queryParams = $_GET;

        $this->body = $this->parseJsonBody();
    }

    private function parseJsonBody(): array {
        if($this->method === 'GET') {
            return [];
        }
    }

}