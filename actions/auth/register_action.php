<?php
session_start();
require '../../database/user_db.php';


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $firstname = $_POST['firstname'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    if (!empty($username) && !empty($firstname) && !empty($email) && !empty($password)) {
        if (!getUserByEmail($email)) {
            registerUser($username, $firstname, $email, $password);
            header('Location: /views/auth/login.php');
            exit();
        } else {
            $_SESSION['error'] = "Un utilisateur avec cet email existe déjà.";
            header('Location: /views/auth/register.php');
            exit();
        }
    } else $_SESSION['error'] = "Tous les champs sont requis.";
    header('Location: /views/auth/register.php');
    exit();


    header('Location: /views/auth/login.php');
    exit();
}
