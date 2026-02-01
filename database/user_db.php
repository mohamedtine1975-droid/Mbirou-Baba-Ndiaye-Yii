<?php
require 'db_connection.php';

function getUserByEmail($email) {
    global $pdo;  // Utilise la connexion PDO du fichier db_connection.php
    $sql = "SELECT * FROM users WHERE email = :email";
    $stmt = $pdo->prepare($sql);  // Prépare la requête (sécurité anti-injection SQL)
    $stmt->bindParam(':email', $email);  // Remplace :email par la valeur
    $stmt->execute();  // Exécute la requête
    return $stmt->fetch();  // Retourne 1 ligne (tableau associatif) ou false
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
    return $stmt->execute();// true si succès, false si échec
}
function getfullnameById($id) {
    global $pdo;
    $sql = "SELECT username, firstname FROM users WHERE id = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':id', $id);
    $stmt->execute();
    $user = $stmt->fetch();
    return $user ? $user['firstname'] . ' ' . $user['username'] : null;
    //          ↑ Si trouvé, concatène prénom + nom,              sinon null
}