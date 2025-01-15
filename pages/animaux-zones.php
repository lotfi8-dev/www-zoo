<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Zoo Arcadia - Animaux & Zones</title>
    <meta name="description" content="Découvrez les habitats du Zoo Arcadia et les animaux fascinants qui y vivent. Explorez la jungle, la savane, les marais et la forêt !">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="/css/Activités.css">
</head>
<body>
    <!-- Barre de navigation -->
    <?php include '../include/navbar.php'; ?>

    <!-- Section Héro -->
    <header class="hero-section text-white text-center">
        <div class="container d-flex flex-column justify-content-center align-items-center h-100">
            <h1 class="display-4">Découvrez nos Animaux & Habitats</h1>
            <p class="lead">Explorez les habitats du Zoo Arcadia et apprenez-en plus sur leurs résidents fascinants.</p>
        </div>
    </header>

    <!-- Section Habitats -->
    <section class="py-5">
        <div class="container">
            <h2 class="text-center text-primary mb-4">Nos Habitats</h2>
            <div class="row g-4">
                <div class="col-md-3">
                    <div class="card">
                        <img src="/images/jungle.png" class="card-img-top" alt="Jungle">
                        <div class="card-body text-center">
                            <h5 class="card-title">Jungle</h5>
                            <p class="card-text">Explorez la jungle, habitat dense et luxuriant pour de nombreuses espèces.</p>
                            <a href="/pages/jungle.php" class="btn btn-primary">Explorer</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card">
                        <img src="/images/savane.png" class="card-img-top" alt="Savane">
                        <div class="card-body text-center">
                            <h5 class="card-title">Savane</h5>
                            <p class="card-text">Découvrez la savane, vaste territoire des animaux majestueux.</p>
                            <a href="/pages/savane.php" class="btn btn-primary">Explorer</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card">
                        <img src="/images/marais.png" class="card-img-top" alt="Marais">
                        <div class="card-body text-center">
                            <h5 class="card-title">Marais</h5>
                            <p class="card-text">Visitez les marais, un écosystème humide et fascinant.</p>
                            <a href="/pages/marais.php" class="btn btn-primary">Explorer</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card">
                        <img src="/images/foret.png" class="card-img-top" alt="Forêt">
                        <div class="card-body text-center">
                            <h5 class="card-title">Forêt</h5>
                            <p class="card-text">Plongez au cœur de la forêt et ses secrets fascinants.</p>
                            <a href="/pages/foret.php" class="btn btn-primary">Explorer</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Section Informations Supplémentaires -->
    <section class="py-5 bg-light">
        <div class="container">
            <h2 class="text-center text-primary mb-4">Nos Programmes de Conservation</h2>
            <div class="row g-4">
                <div class="col-md-6">
                    <div class="card">
                        <img src="/images/Protection des Espèces en Danger.png" class="card-img-top" alt="Programme de Conservation">
                        <div class="card-body">
                            <h5 class="card-title">Protection des Espèces en Danger</h5>
                            <p class="card-text">Le Zoo Arcadia participe activement à la protection des espèces menacées en collaborant avec des organisations internationales.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card">
                        <img src="/images/conservation.png" class="card-img-top" alt="Programme Écologique">
                        <div class="card-body">
                            <h5 class="card-title">Restauration des Habitats Naturels</h5>
                            <p class="card-text">Nous travaillons pour recréer des habitats naturels dans lesquels les animaux peuvent prospérer en toute sécurité.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Section Faits Amusants -->
    <section class="py-5">
        <div class="container">
            <h2 class="text-center text-primary mb-4">Le Saviez-vous ?</h2>
            <div class="row g-4">
                <div class="col-md-4">
                    <div class="card text-center">
                        <div class="card-body">
                            <h5 class="card-title">Le Roi de la Savane</h5>
                            <p class="card-text">Les lions peuvent dormir jusqu'à 20 heures par jour pour économiser leur énergie !</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card text-center">
                        <div class="card-body">
                            <h5 class="card-title">Jungle Mystérieuse</h5>
                            <p class="card-text">La jungle abrite plus de la moitié des espèces animales terrestres de la planète.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card text-center">
                        <div class="card-body">
                            <h5 class="card-title">Des Marais Étonnants</h5>
                            <p class="card-text">Les marais jouent un rôle crucial dans la filtration de l'eau et la prévention des inondations.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <?php include '../include/footer.php'; ?>
</body>
</html>
