<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: /views/auth/produits.php');
    exit;
}

$name = $_POST['name'] ?? '';
$description = $_POST['description'] ?? '';
$price = $_POST['price'] ?? 0;
$quantity = $_POST['quantity'] ?? 0;

// Validation des champs
if (empty($name)) {
    $_SESSION['error'] = "Le nom du produit est obligatoire.";
    header('Location: /views/auth/produits.php');
    exit;
}

if ($price <= 0) {
    $_SESSION['error'] = "Le prix doit être supérieur à 0.";
    header('Location: /views/auth/produits.php');
    exit;
}

if ($quantity < 0) {
    $_SESSION['error'] = "La quantité ne peut pas être négative.";
    header('Location: /views/auth/produits.php');
    exit;
}

require_once '../../database/produit_db.php';

if (createProduit($name, $description, $price, $quantity)) {
    $_SESSION['success'] = "Produit créé avec succès !";
    header('Location: /views/auth/produits1.php');
} else {
    $_SESSION['error'] = "Erreur lors de la création du produit.";
    header('Location: /views/auth/produits.php');
}
exit;
?>