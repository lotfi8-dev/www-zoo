<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Vérification si user_name et user_role sont définis
$user_name = isset($_SESSION['user_name']) ? htmlspecialchars($_SESSION['user_name']) : 'Utilisateur';
$user_role = $_SESSION['user_role'] ?? null; // Vérifie le rôle de l'utilisateur
?>

<!-- Navigation Bar -->
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
                <li class="nav-item"><a class="nav-link" href="/pages/reviews.php">Avis</a></li>

                <!-- 🔹 Onglet "Dashboard" visible uniquement pour les Admins -->
                <?php if ($user_role === 'admin'): ?>
                    <li class="nav-item">
                        <a class="nav-link text-warning fw-bold" href="/pages/admin-dashboard.php">Dashboard</a>
                    </li>
                <?php endif; ?>

                <?php if (isset($_SESSION['user_id'])): ?>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-bs-toggle="dropdown">
                            👤 <?= $user_name; ?> 
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end">
                            <li><a class="dropdown-item text-danger" href="/pages/logout.php">Déconnexion</a></li>
                        </ul>
                    </li>
                <?php else: ?>
                    <li class="nav-item"><a class="btn btn-outline-light ms-2" href="/pages/connexion.php">Connexion</a></li>
                <?php endif; ?>                
            </ul>
        </div>
    </div>
</nav>
