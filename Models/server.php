<?php
declare(strict_types=1);


header('Content-Type: application/json; charset=UTF-8');

$method = $_SERVER['REQUEST_METHOD'] ?? 'GET';
$path = parse_url($_SERVER['REQUEST_URI'] ?? '/', PHP_URL_PATH);


// echo $method, $path;

if ($method === 'GET' && $path === '/users') {
    http_response_code(200);
    echo json_encode([
        'status' => 'success',
        'data' => [
            [
                'id' => 1,
                'name' => 'Nisath',
            ],
            [
                'id' => 2,
                'name' => 'Teora'
            ]
        ]
    ]);
    exit;
}

if($method === 'POST' && $path === '/users') {
    $rawInput = file_get_contents('php://input');
    $data = json_decode($rawInput, true);

    if(empty($data['name'])) {
        http_response_code(400);
        echo json_encode([
            'status' => 'error',
            'message' => 'The "name" field is required'
        ]);
        exit;
    }

    http_response_code(201);
    echo json_encode([
        'status' => 'success',
        'message' => 'User created successfully',
        'data' => [
            'id' => 3,
            'name' => $data['name']
        ]
    ]);
    exit;
}


//Reading ID from the query string (/users?id=3)
/*
if($method === 'DELETE' && $path === '/users') {

    $id = $_GET['id'] ?? null;

    if($id === null || !is_numeric($id)) {
        http_response_code(400);
        echo json_encode([
            'status' => 'error',
            'message' => 'A valid user ID query parameter is required (e.g., /users?id=3)'
        ]);
        exit;
    }

    http_response_code(200); //OK

    echo json_encode([
        'status' => 'success',
        'message' => 'User deleted successfully',
        'deleted_id' => (int)$id
    ]);
    exit;
}
*/


//Reading from the JSON body ({'id' : 3})
if($method === 'DELETE' && $path === '/users') {
    $rawInput = file_get_contents('php://input');
    $data = json_decode($rawInput, true);
    
    $id = $data['id'] ?? null;
    // echo $id;

    if($id === null || !is_numeric($id)) {
        http_response_code(400);
        echo json_encode([
            'status' => 'error',
            'message' => 'Field "id" is required in request body'
        ]);
        exit;
    }

    http_response_code(200);
    echo json_encode([
        'status' => 'success',
        'message' => 'User deleted successfully',
        'deleted_id' => (int)$id
    ]);
    exit;
}


http_response_code(404); //Bad Reqest
echo json_encode([
    'status' => 'error',
    'message' => 'Route not found'
]);
exit;