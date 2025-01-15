<!-- Page HTML pour l'habitat : Jungle -->
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Habitat : Jungle - Zoo Arcadia</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="/css/pages-habitats.css">
</head>
<body>
    <!-- Barre de navigation -->
    <?php include '../include/navbar.php'; ?>

    <!-- Navigation entre habitats -->
    <section class="text-center mt-5">
        <h3 class="text-secondary">Explorez d'autres habitats</h3>
        <div class="d-flex justify-content-center gap-3 mt-4">
            <a href="jungle.php" class="btn btn-custom">Jungle</a>
            <a href="savane.php" class="btn btn-custom">Savane</a>
            <a href="foret.php" class="btn btn-custom">Forêt</a>
            <a href="marais.php" class="btn btn-custom">Marais</a>
        </div>
    </section>

    <!-- Section À propos de la Jungle -->
    <section class="about-section bg-light py-5">
        <div class="container">
            <h2 class="text-center text-secondary mb-4">À propos de la Jungle</h2>
            <p> Une terre sauvage envahie par une végétation dense, souvent presque impénétrable, en particulier une végétation tropicale ou une forêt tropicale humide, mais on peut trouver des animaux qui seront mis en expositions dans les diferents parc zoologique de votre region.. certes pas la totalité des animaux mais pour chaque endroit chaque parc a au moins deux espece de chaque coin du monde.. une étendue d'un tel terrain. un désert de végétation dense ; un morceau de forêt marécageuse et épaisse. Une jungle est une forêt dense peuplée d'arbres, d'autres plantes et d'animaux . Les jungles sont un peu dangereuses, c'est ce que les gens veulent dire quand ils disent : « C'est la jungle là-bas ! » Les jungles, ces épaisses forêts tropicales, regorgent de vie : oiseaux, insectes, reptiles, singes et souvent gorilles et autres animaux:.</p>
        </div>
        <div class="section-divider"></div>
    </section>

    <!-- Section principale -->
    <main class="container py-5">
        <section class="mb-5">
            <h2 class="text-primary text-center mb-4">Animaux de la Jungle</h2>
            <div class="row row-cols-1 row-cols-md-3 g-4">
                <!-- Carte Animal 1 -->
                <div class="col">
                    <div class="card animal-card">
                        <img src="/images/tigre.png" class="card-img-top" alt="Tigre">
                        <div class="card-body">
                            <h5 class="card-title">Tigre</h5>
                            <p class="card-text">Le tigre, prédateur solitaire et majestueux, est un symbole de puissance et de beauté. Sa présence témoigne de la richesse de la jungle.</p>
                            <ul>
                                <li>État : En pleine santé</li>
                                <li>Nourriture : Viande (6 kg)</li>
                                <li>Habitat préféré : Zones denses de la jungle</li>
                                <li>Dernière visite vétérinaire : 01/01/2024</li>
                            </ul>
                        </div>
                    </div>
                </div>

                <!-- Carte Animal 2 -->
                <div class="col">
                    <div class="card animal-card">
                        <img src="/images/singe.png" class="card-img-top" alt="Singe">
                        <div class="card-body">
                            <h5 class="card-title">Singe</h5>
                            <p class="card-text">Le singe, avec son agilité et son intelligence, est un acteur clé des écosystèmes forestiers. Il joue un rôle crucial dans la dispersion des graines.</p>
                            <ul>
                                <li>État : Bonne santé</li>
                                <li>Nourriture : Fruits et insectes (4 kg)</li>
                                <li>Habitat préféré : Canopée</li>
                                <li>Dernière visite vétérinaire : 02/01/2024</li>
                            </ul>
                        </div>
                    </div>
                </div>

                <!-- Carte Animal 3 -->
                <div class="col">
                    <div class="card animal-card">
                        <img src="/images/perrroquet.png" class="card-img-top" alt="Perroquet">
                        <div class="card-body">
                            <h5 class="card-title">Perroquet</h5>
                            <p class="card-text">Le perroquet, connu pour ses couleurs éclatantes et son intelligence, est un ambassadeur de la jungle tropicale.</p>
                            <ul>
                                <li>État : En pleine santé</li>
                                <li>Nourriture : Fruits et noix (2 kg)</li>
                                <li>Capacité : Mimétisme vocal</li>
                                <li>Dernière visite vétérinaire : 03/01/2024</li>
                            </ul>
                        </div>
                    </div>
                </div>

                <!-- Carte Animal 4 -->
                <div class="col">
                    <div class="card animal-card">
                        <img src="/images/serpent.png" class="card-img-top" alt="Serpent">
                        <div class="card-body">
                            <h5 class="card-title">Serpent</h5>
                            <p class="card-text">Le serpent, créature mystérieuse et souvent incomprise, joue un rôle vital dans le contrôle des populations de rongeurs.</p>
                            <ul>
                                <li>État : Bonne santé</li>
                                <li>Nourriture : Petits mammifères (2 kg)</li>
                                <li>Comportement : Nocturne</li>
                                <li>Dernière visite vétérinaire : 04/01/2024</li>
                            </ul>
                        </div>
                    </div>
                </div>

                <!-- Carte Animal 5 -->
                <div class="col">
                    <div class="card animal-card">
                        <img src="/images/leopard.png" class="card-img-top" alt="Léopard">
                        <div class="card-body">
                            <h5 class="card-title">Léopard</h5>
                            <p class="card-text">Le léopard, agile et discret, est un prédateur redoutable capable de s'adapter à divers environnements de la jungle.</p>
                            <ul>
                                <li>État : En pleine santé</li>
                                <li>Nourriture : Viande (5 kg)</li>
                                <li>Capacité : Grimpeur exceptionnel</li>
                                <li>Dernière visite vétérinaire : 05/01/2024</li>
                            </ul>
                        </div>
                    </div>
                </div>

                <!-- Carte Animal 6 -->
                <div class="col">
                    <div class="card animal-card">
                        <img src="/images/grenouille.png" class="card-img-top" alt="Grenouille tropicale">
                        <div class="card-body">
                            <h5 class="card-title">Grenouille tropicale</h5>
                            <p class="card-text">Petite mais colorée, la grenouille tropicale est souvent un indicateur de la santé des écosystèmes de la jungle.</p>
                            <ul>
                                <li>État : Bonne santé</li>
                                <li>Nourriture : Insectes (1 kg)</li>
                                <li>Habitat préféré : Zones humides</li>
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
                <h2 class="text-secondary">Faits intéressants sur la Jungle</h2>
                <ul class="list-unstyled">
                    <li>La jungle abrite plus de 50% des espèces terrestres connues.</li>
                    <li>Elle produit une part importante de l'oxygène de la planète.</li>
                    <li>Les arbres de la jungle peuvent atteindre plus de 60 mètres de hauteur.</li>
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
    <?php include '../include/footer.php'; ?>
</body> 
</html>
