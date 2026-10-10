<?php
require_once 'Card.class.php';
require_once 'Database.class.php';
// ECHO "<PRE>";
$data = User::get('Auth');
// ECHO "</PRE>";


echo json_encode(['data' => $data]);