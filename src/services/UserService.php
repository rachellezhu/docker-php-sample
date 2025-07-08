<?php

class UserService {

 public static function getUserByUsername($db_handle, $username) {
  $sql = "SELECT * FROM users WHERE username=:username";
  $stmt = $db_handle->prepare($sql);
  $stmt->execute(['username' => $username]);
  $result = $stmt->fetch(PDO::FETCH_ASSOC);

  return json_encode($result);
 }

 public static function register($db_handle, $input) {
  $check_user = self::getUserByUsername($db_handle, $input['username']);
  
  if (empty($check_user['username'])) {
   $sql = "INSERT INTO users (username, full_name, email, password) VALUES (:username, :full_name, :email, :password)";
   $stmt = $db_handle->prepare($sql);
   $password = password_hash($input['password'], PASSWORD_BCRYPT, ['cost' => 10]);
   $stmt->execute([
    'username' => $input['username'],
    'full_name' => $input['full_name'],
    'email' => $input['email'],
    'password' => $password
   ]);

   $user = self::getUserByUsername($db_handle, $input['username']);

   echo json_encode([
    'message' => 'User created successfully',
    'data' => json_decode($user)
   ]);

   return true;
  }

  echo $check_user;

  throw new Exception('Username already taken');
 }
}