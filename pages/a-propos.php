<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Zoo Arcadia - À propos</title>
    <meta name="description" content="Découvrez l'histoire, la mission et les valeurs du Zoo Arcadia. Engagez-vous pour la conservation des espèces avec nous !">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="/css/Apropos.css">
</head>
<body>
    <!-- Barre de navigation -->
    <?php include '../include/navbar.php'; ?>

    <!-- Section Héro -->
    <header class="hero-section text-white text-center">
        <div class="container d-flex flex-column justify-content-center align-items-center h-100">
            <h1 class="display-4">À propos du Zoo Arcadia</h1>
            <p class="lead">Notre mission : conservation, éducation et engagement.</p>
        </div>
    </header>

    <!-- Section Historique -->
    <section class="histoire-section py-5">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <h2 class="mb-4">Notre Histoire</h2>
                    <p>
                        Depuis 1990, le Zoo Arcadia a évolué d’un refuge pour animaux blessés à un centre de conservation reconnu dans le monde entier.
                        Avec plus de 500 espèces et un engagement fort pour la biodiversité, notre mission reste inchangée : protéger, éduquer, et inspirer.
                    </p>
                </div>
                <div class="col-lg-6">
                    <div class="image-grid">
                        <img src="/images/historique1.png" class="img-fluid rounded shadow mb-3" alt="Zoo Arcadia en 1990">
                        <img src="/images/historique2.png" class="img-fluid rounded shadow" alt="Visiteurs du Zoo Arcadia">
                    </div>
                </div>
            </div>
        </div>
    </section>
    

    <!-- Section Mission et Valeurs -->
    <section class="mission-section py-5 bg-light">
        <div class="container text-center">
            <h2 class="text-primary">Nos Missions et Valeurs</h2>
            <div class="row mt-4">
                <div class="col-md-4">
                    <img src="/images/conservation.png" class="mb-3" alt="Conservation" height="60">
                    <h5>Conservation</h5>
                    <p>Protéger les espèces en danger et préserver les écosystèmes naturels.</p>
                </div>
                <div class="col-md-4">
                    <img src="/images/education.png" class="mb-3" alt="Éducation" height="60">
                    <h5>Éducation</h5>
                    <p>Sensibiliser le public à l’importance de la biodiversité.</p>
                </div>
                <div class="col-md-4">
                    <img src="/images/bien-etre.png" class="mb-3" alt="Bien-être animal" height="60">
                    <h5>Bien-être Animal</h5>
                    <p>Assurer des conditions de vie optimales pour nos résidents.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Section Équipe -->
    <section class="equipe-section py-5">
        <div class="container">
            <h2 class="text-center text-primary">Rencontrez Notre Équipe</h2>
            <div class="equipe-grid d-flex flex-wrap justify-content-center gap-4 mt-4">
                <div class="equipe-card text-center p-3">
                    <img src="/images/equipe1.png" class="rounded-circle mb-3" alt="Directrice" width="100">
                    <h5>Sophie Dupont</h5>
                    <p>Directrice</p>
                </div>
                <div class="equipe-card text-center p-3">
                    <img src="/images/equipe2.png" class="rounded-circle mb-3" alt="Vétérinaire" width="100">
                    <h5>Dr. Julien Morel</h5>
                    <p>Chef Projet</p>
                </div>
                <div class="equipe-card text-center p-3">
                    <img src="/images/equipe3.png" class="rounded-circle mb-3" alt="Responsable Pédagogique" width="100">
                    <h5>Claire Bernard</h5>
                    <p>Responsable Pédagogique</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Section Partenaires -->
    <section class="partenaires-section py-5 bg-light">
        <div class="container text-center">
            <h2 class="text-primary">Nos Partenaires</h2>
            <div class="row g-4 mt-4">
                <div class="col-md-3">
                    <img src="/images/partnair.png" class="img-fluid rounded" alt="Partenaire 1">
                    <h5>Thoams Park</h5>
                    <p>Stagiaire en alternance</p>
                </div>
                <div class="col-md-3">
                    <img src="/images/partnaire1.png" class="img-fluid rounded" alt="Partenaire 2">
                    <h5>Bolon Mikel</h5>
                    <p>Stagiaire en alternance</p>
                </div>
                <div class="col-md-3">
                    <img src="/images/partnaire3.png" class="img-fluid rounded" alt="Partenaire 3">
                    <h5>Sophie Danot</h5>
                    <p>Stagiaire en alternance</p>
                </div>
                <div class="col-md-3">
                    <img src="/images/partnaire2.png" class="img-fluid rounded" alt="Partenaire 4">
                    <h5>Michale Grant</h5>
                    <p>Stagiaire en alternance</p>
                </div>
            </div>
        </div>
    </section>
   
    <!-- Footer -->
    <?php include '../include/footer.php'; ?>
</body>
</html>
