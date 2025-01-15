   <!-- Barre de navigation -->
   <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
        <div class="container">
            <a class="navbar-brand" href="/index.php">
                <img src="/images/logo.png" alt="Zoo Arcadia" height="40">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link" href="/index.php">Accueil</a></li>
                    <li class="nav-item"><a class="nav-link active" href="/pages/animaux-zones.php">Animaux & Zones</a></li>
                    <li class="nav-item"><a class="nav-link" href="/pages/Activités.php">Activités</a></li>
                    <li class="nav-item"><a class="nav-link" href="/pages/Reservation.php">Réservation</a></li>
                    <li class="nav-item"><a class="nav-link" href="/pages/a-propos.php">À propos</a></li>
                    <li class="nav-item"><a class="nav-link" href="/pages/contact.php">Contact</a></li>
                    <?php if (isset($_SESSION['user'])): ?>
                        <li class="nav-item"><a class="btn btn-outline-light ms-2" href="pages/logout.php">Déconnexion</a></li>
                    <?php else: ?>
                        <li class="nav-item"><a class="btn btn-outline-light ms-2" href="/pages/connexion.php">Connexion</a></li>
                    <?php endif; ?>                
                </ul>
            </div>
        </div>
    </nav>