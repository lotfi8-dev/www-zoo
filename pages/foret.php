<!-- Page HTML pour l'habitat : Forêt -->
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Habitat : Forêt - Zoo Arcadia</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="/css/pages-habitats.css">
</head>
<body>
    <?php include '../include/navbar.php'; ?>

    <!-- Navigation entre habitats -->
    <section class="text-center mt-5">
        <h3 class="text-secondary">Explorez d'autres habitats</h3>
        <div class="d-flex justify-content-center gap-3 mt-4">
            <a href="/pages/jungle.php" class="btn btn-custom">Jungle</a>
            <a href="/pages/savane.php" class="btn btn-custom">Savane</a>
            <a href="/pages/foret.php" class="btn btn-custom">Forêt</a>
            <a href="/pages/marais.php" class="btn btn-custom">Marais</a>

        </div>
    </section>

    <!-- Section À propos de la Forêt -->
    <section class="about-section">
        <h2>À propos de la forêt</h2>
        <p>
            La forêt est importante pour les êtres humains et pour les animaux, les plantes, l'air et l'eau.
            Elle sert d'habitat à de nombreux animaux comme les hérissons, les cerfs, les blaireaux, les salamandres,
            les sangliers. Près de la moitié des espèces animales de Suisse vit dans la forêt ou y trouve sa nourriture et certains d'entre eux on peut les trouver dans des parc zoo comme le notre.
            Mais c'est aussi un refuge pour une biodiversité exceptionnelle, jouant un rôle clé dans la régulation du climat
            et le maintien des cycles naturels. Ses vastes étendues d'arbres fournissent de l'oxygène et abritent de
            nombreuses espèces fascinantes.
        </p>
        <div class="section-divider"></div>
    </section>
    

    <!-- Section principale -->
    <main class="container py-5">
        <section class="mb-5">
            <h2 class="text-primary text-center mb-4">Animaux de la Forêt</h2>
            <div class="row row-cols-1 row-cols-md-3 g-4">
                <!-- Carte Animal 1 -->
                <div class="col">
                    <div class="card animal-card">
                        <img src="/images/cerf.png" class="card-img-top" alt="Cerf">
                        <div class="card-body">
                            <h5 class="card-title">Cerf</h5>
                            <p class="card-text">Le cerf est un symbole de grâce et de force. Il joue un rôle clé dans les écosystèmes forestiers en dispersant les graines et en entretenant les clairières.</p>
                            <ul>
                                <li>État : En pleine santé</li>
                                <li>Nourriture : Feuilles et herbes (5 kg)</li>
                                <li>Habitat préféré : Clairières et sous-bois</li>
                                <li>Dernière visite vétérinaire : 01/01/2024</li>
                            </ul>
                        </div>
                    </div>
                </div>

                <!-- Carte Animal 2 -->
                <div class="col">
                    <div class="card animal-card">
                        <img src="/images/loup.png" class="card-img-top" alt="Loup">
                        <div class="card-body">
                            <h5 class="card-title">Loup</h5>
                            <p class="card-text">Le loup est un prédateur intelligent et social qui vit en meute. Il joue un rôle crucial dans le contrôle des populations d'herbivores.</p>
                            <ul>
                                <li>État : Bonne santé</li>
                                <li>Nourriture : Viande (6 kg)</li>
                                <li>Habitat préféré : Régions boisées</li>
                                <li>Dernière visite vétérinaire : 02/01/2024</li>
                            </ul>
                        </div>
                    </div>
                </div>

                <!-- Carte Animal 3 -->
                <div class="col">
                    <div class="card animal-card">
                        <img src="/images/renard.png" class="card-img-top" alt="Renard">
                        <div class="card-body">
                            <h5 class="card-title">Renard</h5>
                            <p class="card-text">Le renard, rusé et adaptable, est un omnivore qui s'adapte facilement aux changements de son environnement.</p>
                            <ul>
                                <li>État : En pleine santé</li>
                                <li>Nourriture : Petits mammifères et fruits (4 kg)</li>
                                <li>Comportement : Nocturne</li>
                                <li>Dernière visite vétérinaire : 03/01/2024</li>
                            </ul>
                        </div>
                    </div>
                </div>

                <!-- Carte Animal 4 -->
                <div class="col">
                    <div class="card animal-card">
                        <img src="/images/hibou.png" class="card-img-top" alt="Hibou">
                        <div class="card-body">
                            <h5 class="card-title">Hibou</h5>
                            <p class="card-text">L'hibou, avec sa vision nocturne exceptionnelle, est un prédateur redoutable dans les forêts. Il régule les populations de petits rongeurs.</p>
                            <ul>
                                <li>État : Bonne santé</li>
                                <li>Nourriture : Rongeurs et insectes (2 kg)</li>
                                <li>Habitat préféré : Cavités des arbres</li>
                                <li>Dernière visite vétérinaire : 04/01/2024</li>
                            </ul>
                        </div>
                    </div>
                </div>

                <!-- Carte Animal 5 -->
                <div class="col">
                    <div class="card animal-card">
                        <img src="/images/sanglier1.png" class="card-img-top" alt="Sanglier">
                        <div class="card-body">
                            <h5 class="card-title">Sanglier</h5>
                            <p class="card-text">Le sanglier est un omnivore robuste qui contribue à l'entretien des sols forestiers grâce à ses fouilles.</p>
                            <ul>
                                <li>État : En pleine santé</li>
                                <li>Nourriture : Racines et fruits (5 kg)</li>
                                <li>Comportement : Actif la nuit</li>
                                <li>Dernière visite vétérinaire : 05/01/2024</li>
                            </ul>
                        </div>
                    </div>
                </div>

                <!-- Carte Animal 6 -->
                <div class="col">
                    <div class="card animal-card">
                        <img src="/images/ecureuil.png" class="card-img-top" alt="Écureuil">
                        <div class="card-body">
                            <h5 class="card-title">Écureuil</h5>
                            <p class="card-text">L'écureuil, petit et agile, est essentiel pour la dispersion des graines dans la forêt. Il stocke souvent de la nourriture pour les périodes difficiles.</p>
                            <ul>
                                <li>État : Bonne santé</li>
                                <li>Nourriture : Noix et graines (1 kg)</li>
                                <li>Comportement : Diurne</li>
                                <li>Dernière visite vétérinaire : 06/01/2024</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <hr style="border: 5px solid #6d1f1f; margin: 30px 0;">


        <!-- Section Faits intéressants -->
        <section class="stats-section py-5">
            <div class="container text-center">
                <h2 class="text-secondary">Faits intéressants sur la Forêt</h2>
                <ul class="list-unstyled">
                    <li>Les forêts couvrent environ 31% de la surface terrestre mondiale.</li>
                    <li>Elles abritent environ 80% de la biodiversité terrestre.</li>
                    <li>Les forêts jouent un rôle crucial dans le cycle de l'eau et la régulation climatique.</li>
                </ul>
            </div>
        </section>

        <hr style="border: 5px solid #6d1f1f; margin: 30px 0;">

        
        <section id="maps" class="maps-section">
            <div class="container">
                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3151.8354345095766!2d144.95373561580688!3d-37.81627944202186!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x6ad65d43f0dfac07%3A0x5045675218ce7e0!2sMelbourne%20VIC%2C%20Australia!5e0!3m2!1sen!2sfr!4v1680391706573!5m2!1sen!2sfr"
                    width="100%" height="300" style="border:0;" allowfullscreen="" loading="lazy">
                </iframe>
            </div>
        </section>       


    <!-- Footer -->
    <footer class="bg-dark text-white text-center py-4">
        <p>&copy; 2024 Zoo Arcadia. Tous droits réservés.</p>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
