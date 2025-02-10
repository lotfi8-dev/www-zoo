
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand" href="#">Zoo Arcadia</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item"><a class="nav-link" href="../pages/admin-dashboard.php">Tableau de bord</a></li>
                <li class="nav-item"><a class="nav-link" href="../pages/habitats.php">Habitats</a></li>
                <li class="nav-item"><a class="nav-link" href="../pages/animaux.php">Animaux</a></li>
                <li class="nav-item"><a class="nav-link" href="../pages/visiteurs.php">Visiteurs</a></li>
            </ul>
        </div>

        <div class="d-flex">
            <?php if (isset($_SESSION['user_id'])): ?>
                <a href="../pages/logout.php" class="btn btn-danger">Déconnexion</a>
            <?php else: ?>
                <a href="../pages/connexion.php" class="btn btn-success">Connexion</a>
            <?php endif; ?>
        </div>
    </div>
</nav>
