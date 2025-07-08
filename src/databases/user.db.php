<?php

$db_host = getenv('DB_HOST');
$db_name = getenv('DB_NAME');
$db_user = getenv('DB_USER');

$password_file_path = getenv('PASSWORD_FILE_PATH');

$db_pass = trim(file_get_contents($password_file_path));

try {
$db_handle = new PDO("mysql:host=$db_host;dbname=$db_name", $db_user, $db_pass);
$db_handle->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$db_handle->exec("
 CREATE TABLE IF NOT EXISTS users (
  id INT AUTO_INCREMENT PRIMARY KEY,
  username varchar(100) NOT NULL,
  full_name varchar(255) NOT NULL,
  email varchar(255) NOT NULL,
  password varchar(255) NOT NULL
 )");
}
catch(PDOException $e) {
 die("Connection failed: " . $e->getMessage());
}