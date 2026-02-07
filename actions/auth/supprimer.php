<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header('Location: /views/auth/login.php');
    exit;
}

$id = $_GET['id'] ?? null;

if (!$id) {
    $_SESSION['error'] = "ID du produit manquant.";
    header('Location: /views/auth/produits1.php');
    exit;
}

require_once '../../database/produit_db.php';

if (deleteProduit($id)) {
    $_SESSION['success'] = "Produit supprimé avec succès !";
} else {
    $_SESSION['error'] = "Erreur lors de la suppression.";
}

header('Location: /views/auth/produits1.php');
exit;
?>