<!-- Page HTML pour l'habitat : Marais -->
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Habitat : Marais - Zoo Arcadia</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="/css/pages-habitats.css">
</head>
<body>
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

    <!-- Section À propos des Marais -->
    <section class="about-section bg-light py-5">
        <div class="container">
            <h2 class="text-center text-secondary mb-4">À propos des Marais</h2>
            <p>Les marais sont des zones humides qui jouent un rôle crucial dans l'équilibre écologique, mais on peut trouver des animaux qui seront mis en expositions dans les diferents parc zoologique de votre region.. certes pas la totalité des animaux mais pour chaque endroit chaque parc a au moins deux espece de chaque coin du monde. Ils servent de filtre naturel pour l'eau, abritent une biodiversité exceptionnelle et offrent un habitat unique à de nombreuses espèces. Cet écosystème est également vital pour la lutte contre les changements climatiques grâce à sa capacité à stocker du carbone,Formation paysagère où le sol est recouvert, en permanence ou par intermittence, d'une couche d'eau stagnante, généralement peu profonde et couvert de végétations.</p>
        </div>
        <div class="section-divider"></div>

    </section>

    <!-- Section principale -->
    <main class="container py-5">
        <section class="mb-5">
            <h2 class="text-primary text-center mb-4">Animaux des Marais</h2>
            <div class="row row-cols-1 row-cols-md-3 g-4">
                <!-- Carte Animal 1 -->
                <div class="col">
                    <div class="card animal-card">
                        <img src="/images/castor.png" class="card-img-top" alt="Castor">
                        <div class="card-body">
                            <h5 class="card-title">Castor</h5>
                            <p class="card-text">Le castor est un ingénieur naturel, célèbre pour ses barrages qui modifient l'écosystème et créent des zones de vie pour d'autres espèces. Ces structures uniques permettent de stocker l'eau et de limiter les crues.</p>
                            <ul>
                                <li>État : En pleine santé</li>
                                <li>Nourriture : Écorce et branches (5 kg)</li>
                                <li>Dernière visite vétérinaire : 01/01/2024</li>
                            </ul>
                        </div>
                    </div>
                </div>

                <!-- Carte Animal 2 -->
                <div class="col">
                    <div class="card animal-card">
                        <img src="/images/ibis.png" class="card-img-top" alt="Ibis Rouge">
                        <div class="card-body">
                            <h5 class="card-title">Ibis Rouge</h5>
                            <p class="card-text">L'ibis rouge est un oiseau coloré et gracieux, souvent aperçu en groupes dans les zones marécageuses. Il contribue à l'équilibre de l'écosystème en se nourrissant d'insectes et de crustacés.</p>
                            <ul>
                                <li>État : En bonne santé</li>
                                <li>Nourriture : Insectes et crustacés (2 kg)</li>
                                <li>Dernière visite vétérinaire : 02/01/2024</li>
                            </ul>
                        </div>
                    </div>
                </div>

                <!-- Carte Animal 3 -->
                <div class="col">
                    <div class="card animal-card">
                        <img src="/images/canard.png" class="card-img-top" alt="Canard">
                        <div class="card-body">
                            <h5 class="card-title">Canard</h5>
                            <p class="card-text">Le canard, avec ses comportements sociaux fascinants, est un symbole des marais. Ses migrations saisonnières contribuent à la dispersion des graines dans différentes régions.</p>
                            <ul>
                                <li>État : Bonne santé</li>
                                <li>Nourriture : Graines et petits poissons (3 kg)</li>
                                <li>Dernière visite vétérinaire : 03/01/2024</li>
                            </ul>
                        </div>
                    </div>
                </div>

                <!-- Carte Animal 4 -->
                <div class="col">
                    <div class="card animal-card">
                        <img src="/images/loutre.png" class="card-img-top" alt="Loutre de rivière">
                        <div class="card-body">
                            <h5 class="card-title">Loutre de rivière</h5>
                            <p class="card-text">La loutre, joueur et habile nageur, est un prédateur clé des marais. Elle maintient l'équilibre en régulant les populations de poissons et d'autres proies aquatiques.</p>
                            <ul>
                                <li>État : En pleine santé</li>
                                <li>Nourriture : Poissons et mollusques (4 kg)</li>
                                <li>Dernière visite vétérinaire : 04/01/2024</li>
                            </ul>
                        </div>
                    </div>
                </div>

                <!-- Carte Animal 5 -->
                <div class="col">
                    <div class="card animal-card">
                        <img src="/images/grenouille.png" class="card-img-top" alt="Grenouille">
                        <div class="card-body">
                            <h5 class="card-title">Grenouille</h5>
                            <p class="card-text">Les grenouilles, petites mais essentielles, aident à contrôler les populations d'insectes. Elles jouent aussi un rôle important dans la chaîne alimentaire.</p>
                            <ul>
                                <li>État : En pleine santé</li>
                                <li>Nourriture : Insectes et larves (1 kg)</li>
                                <li>Dernière visite vétérinaire : 05/01/2024</li>
                            </ul>
                        </div>
                    </div>
                </div>

                <!-- Carte Animal 6 -->
                <div class="col">
                    <div class="card animal-card">
                        <img src="/images/heron.png" class="card-img-top" alt="Héron">
                        <div class="card-body">
                            <h5 class="card-title">Héron</h5>
                            <p class="card-text">Le héron est un chasseur patient, souvent observé immobile dans les eaux peu profondes. Il capture des poissons et contribue à la régulation des populations aquatiques.</p>
                            <ul>
                                <li>État : Bonne santé</li>
                                <li>Nourriture : Poissons et amphibiens (5 kg)</li>
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
                <h2 class="text-secondary">Faits intéressants sur les Marais</h2>
                <ul class="list-unstyled">
                    <li>Les marais peuvent absorber et stocker d'énormes quantités d'eau, réduisant ainsi les risques d'inondation.</li>
                    <li>Ils abritent plus de 40% des espèces animales aquatiques dans le monde.</li>
                    <li>Les marais agissent comme des poumons pour la planète, capturant le carbone atmosphérique et purifiant l'air.</li>
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
    </main>
    

    <!-- Footer -->
    <footer class="bg-dark text-white text-center py-4">
        <p>&copy; 2024 Zoo Arcadia. Tous droits réservés.</p>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
