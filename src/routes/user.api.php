<?php

header("Content-Type: application/json");
include '../databases/user.db.php';
include '../services/UserService.php';

$method = $_SERVER['REQUEST_METHOD'];
$input = json_decode(file_get_contents('php://input'), true);

switch ($method) {
 case 'POST':
  UserService::register($db_handle, $input);
  break;

 default:
  return json_encode(['message' => 'Invalid request method']);
}