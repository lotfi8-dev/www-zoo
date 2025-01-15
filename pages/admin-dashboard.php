<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Zoo Arcadia - Tableau de Bord Administrateur</title>
    <meta name="description" content="Gérez les utilisateurs, réservations et rapports depuis le tableau de bord administrateur du Zoo Arcadia.">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="/css/admin-dashboard.css">
</head>
<body>
    <!-- Barre de navigation -->
    <?php include '../include/navbar.php'; ?>

    <!-- Section Tableau de Bord Administrateur -->
    <section class="py-5">
        <div class="container">
            <h2 class="text-center text-primary mb-4">Tableau de Bord Administrateur</h2>
            <p class="text-center">Gérez les utilisateurs, les réservations et les rapports depuis votre espace sécurisé.</p>
            <div class="row g-4">
                <div class="col-md-4">
                    <div class="card text-center">
                        <div class="card-body">
                            <h5 class="card-title">Gestion des Utilisateurs</h5>
                            <p class="card-text">Ajoutez, modifiez ou supprimez des comptes utilisateurs.</p>
                            <a href="#" class="btn btn-primary">Gérer les utilisateurs</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card text-center">
                        <div class="card-body">
                            <h5 class="card-title">Réservations</h5>
                            <p class="card-text">Consultez et modifiez les réservations des visiteurs.</p>
                            <a href="#" class="btn btn-primary">Voir les réservations</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card text-center">
                        <div class="card-body">
                            <h5 class="card-title">Rapports et Statistiques</h5>
                            <p class="card-text">Analysez les données clés du zoo avec des rapports détaillés.</p>
                            <a href="#" class="btn btn-primary">Voir les rapports</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Section Notifications et Alertes -->
    <section class="py-5 bg-light">
        <div class="container">
            <h2 class="text-center text-primary mb-4">Notifications et Alertes</h2>
            <ul class="list-group">
                <li class="list-group-item">Nouvelle réservation ajoutée par un visiteur.</li>
                <li class="list-group-item">Mise à jour requise pour le suivi des animaux.</li>
                <li class="list-group-item">Rapport mensuel disponible pour téléchargement.</li>
                <li class="list-group-item">Un utilisateur a demandé une assistance technique.</li>
            </ul>
        </div>
    </section>

    <!-- Section Historique des Activités -->
    <section class="py-5">
        <div class="container">
            <h2 class="text-center text-primary mb-4">Historique des Activités</h2>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Date</th>
                        <th>Activité</th>
                        <th>Utilisateur</th>
                        <th>Statut</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>2025-01-01</td>
                        <td>Ajout d'une réservation</td>
                        <td>Jean Dupont</td>
                        <td>Complété</td>
                    </tr>
                    <tr>
                        <td>2025-01-02</td>
                        <td>Mise à jour des données animaux</td>
                        <td>Claire Martin</td>
                        <td>En cours</td>
                    </tr>
                    <tr>
                        <td>2025-01-03</td>
                        <td>Création d'un nouveau compte employé</td>
                        <td>Admin</td>
                        <td>Complété</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </section>

    <!-- Footer -->
    <?php include '../include/footer.php'; ?>
</body>
</html>
