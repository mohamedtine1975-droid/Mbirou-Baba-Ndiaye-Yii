<?php
session_start();


if (!isset($_SESSION['user_id'])) {
    header('Location: /views/auth/login.php');
    exit;
}


require_once '../../database/user_db.php'; 
require_once '../../database/produit_db.php';

$produits = true;
$pageTitle = "Produits";


include '../../header.php';
include '../../navbar.php';

$listeProduits = getAllProduits();
?>

<main class="container mt-5">
    <div class="d-flex justify-content-between mb-4">
        <h1>Mes Produits</h1>
        <a href="./produits.php" class="btn btn-primary">
            Ajouter un produit
        </a>
    </div>

    <?php if (empty($listeProduits)): ?>
        <div class="alert alert-info">
            Aucun produit pour le moment.
            <a href="/views/produits/create.php">Ajoutez-en un !</a>
        </div>
    <?php else: ?>
        <div class="row">
            <?php foreach ($listeProduits as $produit): ?>
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo htmlspecialchars($produit['name']); ?></h5>
                            <p class="card-text"><?php echo htmlspecialchars($produit['description']); ?></p>
                            <p class="mb-1"><strong>Prix :</strong> <?php echo $produit['price']; ?> FCFA</p>
                            <p class="mb-3"><strong>Quantité :</strong> <?php echo $produit['quantity']; ?></p>
                            <div class="d-flex gap-2">
                                <a href="/actions/auth/modifier.php?id=<?php echo $produit['id']; ?>"
                                    class="btn btn-primary">Modifier</a>
                                <a href="/actions/auth/supprimer.php?id=<?php echo $produit['id']; ?>"
                                    class="btn btn-danger">Supprimer</a>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>
</main>

<?php include '../../footer.php'; ?>