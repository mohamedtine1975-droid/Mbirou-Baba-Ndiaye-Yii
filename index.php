<?php 
$index=true;
$pageTitle = "Accueil - Mon Site";
include 'header.php'; 
include 'database/user_db.php';
?>
<?php include 'navbar.php'; ?>

<main>
    <!-- Contenu spécifique de la page -->
    <h1>Bienvenue <?php echo getfullnameById($_SESSION['user_id']); ?> sur ma page</h1>
</main>

<?php include 'footer.php'; ?>