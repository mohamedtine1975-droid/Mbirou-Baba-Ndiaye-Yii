<?php 
$index=true;
$pageTitle = "Accueil - Mon Site";
session_start();
require_once 'database/user_db.php';
require_once 'database/produit_db.php';

include 'header.php';
include 'navbar.php'; 
?>

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