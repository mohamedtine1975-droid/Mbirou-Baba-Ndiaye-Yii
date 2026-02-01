<?php
session_start();
$host = 'localhost';
$user = 'root';
$password = '';
$dbname = 'l2_gl_app';

try {
    //DSN (Data Source Name) = Chaîne de connexion qui indique : serveur, base, encodage
    $dsn = "mysql:host=$host;dbname=$dbname;charset=utf8mb4";
    $options = [
        PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,//retourne un tableau associatif
        PDO::ATTR_EMULATE_PREPARES   => false,
    ];
    //Crée l'objet $pdo qui sera utilisé dans tous les autres fichiers
    $pdo = new PDO($dsn, $user, $password, $options);
} catch (PDOException $e) {
    die("connexion echouée: " . $e->getMessage());
}