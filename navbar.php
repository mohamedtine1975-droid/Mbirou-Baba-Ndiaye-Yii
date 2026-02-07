<nav class="navbar navbar-expand-md navbar-dark bg-dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="/index.php">L2GL APP</a>
        
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarContent">
            <span class="navbar-toggler-icon"></span>
        </button>
        
        <div class="collapse navbar-collapse" id="navbarContent">
            <ul class="navbar-nav me-auto">
                <li class="nav-item">
                    <a class="nav-link" href="/index.php">Accueil</a>
                </li>
                <?php if (isset($_SESSION['user_id'])): ?>
                    <li class="nav-item">
                        <a class="nav-link" href="/views/auth/produits1.php">Produits</a>
                    </li>
                <?php endif; ?>
                
                <?php if (!isset($_SESSION['user_id'])): ?>
                    <li class="nav-item">
                        <a class="nav-link" href="/views/auth/login.php">Connexion</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/views/auth/register.php">Inscription</a>
                    </li>
                <?php endif; ?>
            </ul>
            
            <?php if (isset($_SESSION['user_id'])): ?>
                <form action="/actions/auth/logout_action.php" method="POST">
                    <button class="btn btn-outline-danger" type="submit">Déconnexion</button>
                </form>
            <?php endif; ?>
        </div>
    </div>
</nav>