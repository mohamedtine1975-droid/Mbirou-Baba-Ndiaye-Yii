<?php 
session_start();
$produit=true; 
$pageTitle = "Produits - Mon Site";
include '../../header.php';

 include '../../navbar.php'; 
 $errorMessage = $_SESSION['error'] ?? null;
unset($_SESSION['error']);
 ?>
<main>
    <h1>Nouveau Produits</h1>
    <?php if ($errorMessage): ?>
        <div class="alert alert-danger"><?php echo htmlspecialchars($errorMessage); ?></div>
    <?php endif; ?>
    <!-- Contenu spécifique de la page -->
      <form action="../../actions/auth/create_produit_action.php" method="post">
    <div class="mb-3">
        <label for="libelle" class="form-label">libelle</label>
        <input type="text" class="form-control" id="libelle" name="name" >
    </div>
    <div class="mb-3">
        <label for="prix" class="form-label">Prix</label>
        <input type="number" step="0.01" class="form-control" id="prix" name="price" max="20000000">
    </div>
    <div class="mb-3">
        <label for="quantite" class="form-label">Quantité</label>
        <input type="number" class="form-control" id="quantite" name="quantity" min="5" max="100">
    </div>
    <div class="mb-3"> 
        <label for="description" class="form-label">Description</label>
        <textarea class="form-control" id="description" name="description" maxlength="250"></textarea>
    </div>
    
    <button type="submit" class="btn btn-primary">Enregistrer</button>
 </form>
</main>
<?php include '../../footer.php'; ?>