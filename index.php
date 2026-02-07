<?php 
$index=true;//pour indiquer que nous sommes sur la page d'accueil
$pageTitle = "Accueil - Mon Site";
include 'header.php'; 
include 'database/user_db.php';
?>
<?php include 'navbar.php'; ?>

<main>
    <!-- Contenu spécifique de la page -->
   <h1>
    Bienvenue 
    <?php 
    if (isset($_SESSION['user_id'])) {
        echo htmlspecialchars(getfullnameById($_SESSION['user_id']));
    } else {
        echo "Invité";
    }
    ?> 
    sur ma page
</h1>
</main>

<?php include 'footer.php'; ?>