<?php
require 'db_connection.php';

function getAllProduits() {
    global $pdo;
    $sql = "SELECT * FROM produits";
    $stmt = $pdo->query($sql);
    return $stmt->fetchAll();
}

function getProduitById($id) {
    global $pdo;
    $sql = "SELECT * FROM produits WHERE id = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':id', $id);
    $stmt->execute();
    return $stmt->fetch();
}

function createProduit($name, $description, $price, $quantity) {
    global $pdo;
    $sql = "INSERT INTO produits (name, description, price, quantity) VALUES (:name, :description, :price, :quantity)";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':name', $name);
    $stmt->bindParam(':description', $description);
    $stmt->bindParam(':price', $price);
    $stmt->bindParam(':quantity', $quantity);
    return $stmt->execute();
}
function updateProduit($id, $name, $description, $price, $quantity) {
    global $pdo;
    $sql = "UPDATE produits SET name = :name, description = :description, price = :price, quantity = :quantity WHERE id = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':id', $id);
    $stmt->bindParam(':name', $name);
    $stmt->bindParam(':description', $description);
    $stmt->bindParam(':price', $price);
    $stmt->bindParam(':quantity', $quantity);
    return $stmt->execute();
}
function deleteProduit($id) {
    global $pdo;
    $sql = "DELETE FROM produits WHERE id = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':id', $id);
    return $stmt->execute();
}

