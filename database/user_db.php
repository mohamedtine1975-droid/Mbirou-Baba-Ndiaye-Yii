<?php
require 'db_connection.php';

Function getUserByEmail($email) {
    global $pdo;
    $sql = "SELECT * FROM users WHERE email = :email";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':email', $email);
    $stmt->execute();
    return $stmt->fetch();
}
function registerUser($username, $firstname, $email, $password) {
    global $pdo;
    $sql = "INSERT INTO users (username, firstname, email, password) VALUES (:username, :firstname, :email, :password)";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':username', $username);
    $stmt->bindParam(':firstname', $firstname);
    $stmt->bindParam(':email', $email);
    // hashage du mot de passe avant de le stocker
    $hashedPassword = password_hash($password, PASSWORD_BCRYPT);
    $stmt->bindParam(':password', $hashedPassword);
    return $stmt->execute();
}
function getfullnameById($id) {
    global $pdo;
    $sql = "SELECT username, firstname FROM users WHERE id = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':id', $id);
    $stmt->execute();
    $user = $stmt->fetch();
    return $user ? $user['firstname'] . ' ' . $user['username'] : null;
}