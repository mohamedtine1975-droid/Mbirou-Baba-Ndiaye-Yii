<?php
session_start();
require '../../database/user_db.php';
$pageTitle = "Connexion - Mon Site";
include '../../header.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    if (!empty($email) && !empty($password)) {
        $user = getUserByEmail($email); 
        if ($user) { 
            
            if (password_verify($password, $user['password'])) {
                
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['username'] = $user['username'];
                header('Location: /index.php');
                exit();
            } else {
                $_SESSION['error'] = "Mot de passe incorrect.";
                header('Location: /views/auth/login.php');
                exit();
            }
        } else {
            $_SESSION['error'] = "Aucun utilisateur trouvé avec cet email.";
            header('Location: /views/auth/login.php');
            exit();
        }
    } else {
        $_SESSION['error'] = "Tous les champs sont requis.";
        header('Location: /views/auth/login.php');
        exit();
    }
}
