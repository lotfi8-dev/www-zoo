<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Zoo Arcadia - Réservation</title>
    <meta name="description" content="Réservez votre visite au Zoo Arcadia et découvrez nos habitats uniques et nos animaux fascinants. Planifiez votre journée au zoo !">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="/css/Reservation.css">
</head>
<body>
    <!-- Navbar -->
    <?php include '../include/navbar.php'; ?>

    <!-- Section Hero -->
    <header class="hero-section text-white text-center">
        <div class="container d-flex flex-column justify-content-center align-items-center h-100">
            <h1 class="display-4">Réservez votre visite au Zoo Arcadia</h1>
            <p class="lead">Planifiez une journée mémorable en explorant nos habitats et nos animaux fascinants.</p>
        </div>
    </header>

    <!-- Formulaire de Réservation -->
    <section class="reservation-section py-5">
        <div class="container">
            <form action="#" method="POST" class="reservation-form bg-light p-4 rounded shadow">
                <div class="row g-3">
                    <div class="col-md-6">
                        <label for="name" class="form-label">Nom complet</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="Entrez votre nom" required>
                    </div>
                    <div class="col-md-6">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="Entrez votre email" required>
                    </div>
                </div>
                <div class="row g-3 mt-3">
                    <div class="col-md-6">
                        <label for="date" class="form-label">Date de visite</label>
                        <input type="date" class="form-control" id="date" name="date" required>
                    </div>
                    <div class="col-md-6">
                        <label for="nb_personnes" class="form-label">Nombre de personnes</label>
                        <input type="number" class="form-control" id="nb_personnes" name="nb_personnes" min="1" max="20" placeholder="Entrez le nombre de participants" required>
                    </div>
                </div>
                <div class="mt-3">
                    <label for="message" class="form-label">Message ou demandes particulières</label>
                    <textarea class="form-control" id="message" name="message" rows="4" placeholder="Ajoutez un message ou des demandes spéciales"></textarea>
                </div>
                <button type="submit" class="btn btn-primary w-100 mt-4">Envoyer ma réservation</button>
            </form>
        </div>
    </section>

    <!-- Section Informations Supplémentaires -->
    <section class="info-section py-5 bg-light">
        <div class="container">
            <h2 class="text-center text-primary mb-4">Informations Utiles</h2>
            <div class="row">
                <div class="col-md-4 text-center">
                    <i class="fas fa-clock fa-3x text-success mb-3"></i>
                    <p><strong>Horaires :</strong> Ouvert tous les jours de 9h à 18h</p>
                </div>
                <div class="col-md-4 text-center">
                    <i class="fas fa-ticket-alt fa-3x text-warning mb-3"></i>
                    <p><strong>Tarifs :</strong> Adulte 15€, Enfant 10€, Gratuit pour les moins de 3 ans</p>
                </div>
                <div class="col-md-4 text-center">
                    <i class="fas fa-map-marker-alt fa-3x text-danger mb-3"></i>
                    <p><strong>Adresse :</strong> 123 Rue des Animaux, 75000 Paris</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <?php include '../include/footer.php'; ?>
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
</body>
</html>
