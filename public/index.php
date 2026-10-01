<?php
require_once __DIR__ . '/../vendor/autoload.php';

use EliteFort\Http\Response;



Response::json([
    'status' => 'success',
    'message' => 'Welcome to EliteFort API Core v10',
    'version' => '1.0.0',
    'author' => 'EliteFort'
], 200);