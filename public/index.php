<?php
require_once __DIR__ . '/../vendor/autoload.php';

use EliteFort\Http\Response;



// Response::json([
//     'status' => 'success',
//     'message' => 'Welcome to EliteFort API Core v10',
//     'version' => '1.0.0',
//     'author' => 'EliteFort'
// ], 200);

// Response::json([
//     'status' => 'error',
//     'message' => 'Bad Request',
//     // 'version' => '1.0.0',
//     // 'author' => 'EliteFort'
// ], 400);


// $errors = ['email' => 'nisathnisath606@gmail.com'];

// Response::error(
//     'Bad Request',
//     400,
//     $errors,
// );

// $payload = [
//     'id' => 1,
//     'name' => 'Nisath',
//     'location' => 'Batticaloa'
// ];


// Response::success(
//     $payload,
//     'Thank you for register the account',
// );

// Response::error(
//     'User resource not found',
//     404
// );

//--------------------------------------------------------------

// $jsonData = '{
//     "id" : 101,
//     "name" : "Nisath",
//     "role" : "Developer" 
// }';

// $userObject = json_decode($jsonData);
// // print_r($userObject);

// if(json_last_error() !== JSON_ERROR_NONE) {
//     Response::error('Invalid JSON', 400);
// }


// try {
//     $userObject = json_decode(
//         $jsonData,
//         false,
//         512,
//         JSON_THROW_ON_ERROR
//     );
// } catch (JsonException $e) {
//     Response::error('Invalid JSON', 400);
//     exit;
// }


// $response = [
//     'status'  => 201,
//     'message' => 'Resource successfully created',
//     'data'    => [
//         'userId' => $userObject->id,
//         'name'   => $userObject->name,
//         'role'   => $userObject->role
//     ]
// ];

// Response::json([
//     'status'  => 201,
//     'message' => 'Resource successfully created',
//     'data'    => [
//         'userId' => $userObject->id,
//         'name'   => $userObject->name,
//         'role'   => $userObject->role
//     ]
// ], 201);

//--------------------------------------------------------------




