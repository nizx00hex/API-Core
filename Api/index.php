<?php
header('Content-Type: application/json');

$method = $_SERVER['REQUEST_METHOD'];


if($method === 'GET') {
    http_response_code(200); // OK

    echo json_encode([
        'message' => 'Hello! You sent a GET request to read data.'
    ]);

    exit;
}


if($method === 'POST') {
    $rawBody = file_get_contents('php://input');

    $data = json_decode($rawBody, true);

    if(empty($data['name'])) {
        http_response_code(400); //Bad Request
        echo json_encode([
            'status' => 'error',
            'message' => 'Please provide a name!'
        ]);
        exit;
    }

    http_response_code(201); // Created;
    echo json_encode([
        'status' => 'success',
        'message' => 'User ' . $data['name'] . ' was created successfully!'
    ]);
    exit;
}

/**
 * after we finish our basic we write a small login signup curd and search
 */