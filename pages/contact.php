<?php
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Zoo Arcadia - Contact</title>
    <meta name="description" content="Contactez le Zoo Arcadia pour toute question ou information. Nous sommes là pour vous aider !">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="/css/Contact.css">
</head>
<body>
    <!-- Barre de navigation -->
    <?php include '../include/navbar.php'; ?>

    <!-- Section Héro -->
    <header class="hero-section text-white text-center">
        <div class="container d-flex flex-column justify-content-center align-items-center h-100">
            <h1 class="display-4">Contactez le Zoo Arcadia</h1>
            <p class="lead">Nous sommes là pour répondre à toutes vos questions et demandes.</p>
        </div>
    </header>

    <!-- Section Formulaire de Contact -->
    <section class="py-5">
        <div class="container">
            <h2 class="text-center text-primary mb-4">Formulaire de Contact</h2>
            <form action="#" method="POST" class="bg-light p-4 rounded shadow">
                <div class="mb-3">
                    <label for="name" class="form-label">Nom complet</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="Entrez votre nom" required>
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="Entrez votre email" required>
                </div>
                <div class="mb-3">
                    <label for="message" class="form-label">Votre message</label>
                    <textarea class="form-control" id="message" name="message" rows="4" placeholder="Entrez votre message" required></textarea>
                </div>
                <button type="submit" class="btn btn-primary w-100">Envoyer</button>
            </form>
        </div>
    </section>

    <!-- Section Informations de Contact -->
    <section class="py-5 bg-light">
        <div class="container">
            <h2 class="text-center text-primary mb-4">Nos Coordonnées</h2>
            <div class="row">
                <div class="col-md-4 text-center">
                    <i class="bi bi-telephone-fill display-4 text-primary"></i>
                    <h5 class="mt-3">Téléphone</h5>
                    <p>+33 1 23 45 67 89</p>
                </div>
                <div class="col-md-4 text-center">
                    <i class="bi bi-envelope-fill display-4 text-primary"></i>
                    <h5 class="mt-3">Email</h5>
                    <p>contact@zooarcadia.com</p>
                </div>
                <div class="col-md-4 text-center">
                    <i class="bi bi-geo-alt-fill display-4 text-primary"></i>
                    <h5 class="mt-3">Adresse</h5>
                    <p>123 Rue des Animaux, 75000 Paris</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Section Carte -->
    <section class="py-5">
        <div class="container">
            <h2 class="text-center text-primary mb-4">Trouvez-nous</h2>
            <div class="embed-responsive embed-responsive-16by9">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3151.8354345095766!2d144.95373561580688!3d-37.81627944202186!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x6ad65d43f0dfac07%3A0x5045675218ce7e0!2sMelbourne%20VIC%2C%20Australia!5e0!3m2!1sen!2sfr!4v1680391706573!5m2!1sen!2sfr" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <?php include '../include/footer.php'; ?>
</body>
</html>
