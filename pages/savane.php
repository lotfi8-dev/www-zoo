<!-- Page HTML pour l'habitat : Savane -->
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Habitat : Savane - Zoo Arcadia</title>
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
            <a href="/pages/jungle.php" class="btn btn-custom">Jungle</a>
            <a href="/pages/savane.php" class="btn btn-custom">Savane</a>
            <a href="/pages/foret.php" class="btn btn-custom">Forêt</a>
            <a href="/pages/marais.php" class="btn btn-custom">Marais</a>

        </div>
    </section>

    <!-- Section À propos de la Savane -->
    <section class="about-section bg-light py-5">
        <div class="container">
            <h2 class="text-center text-secondary mb-4">À propos de la Savane</h2>
            <p>La savane est une vaste plaine herbeuse parsemée d'arbres et d'arbustes. C'est un habitat emblématique où cohabitent de nombreux animaux majestueux comme les lions, les girafes et les zèbres. Cet écosystème unique est crucial pour le maintien de la biodiversité en Afrique, elle est aussi composée d'herbes hautes recouvrant le sol à perte de vue, de quelques arbustes nains et de rares arbres, dispersés ici et là. Car la plupart du temps, les savanes sont situées entre les forêts et les prairies.</p>
        </div>
        <div class="section-divider"></div>
    </section>
    

    <!-- Section principale -->
    <main class="container py-5">
        <section class="mb-5">
            <h2 class="text-primary text-center mb-4">Animaux de la Savane</h2>
            <div class="row row-cols-1 row-cols-md-3 g-4">
                <!-- Carte Animal 1 -->
                <div class="col">
                    <div class="card animal-card">
                        <img src="/images/Lion.png" class="card-img-top" alt="Lion">
                        <div class="card-body">
                            <h5 class="card-title">Lion</h5>
                            <p class="card-text">Le lion, surnommé le roi des animaux, est un prédateur emblématique. Sa puissance et son rôle dans l'écosystème font de lui un acteur clé de la savane.</p>
                            <ul>
                                <li>État : En pleine santé</li>
                                <li>Nourriture : Viande (5 kg)</li>
                                <li>Dernière visite vétérinaire : 01/01/2024</li>
                            </ul>
                        </div>
                    </div>
                </div>

                <!-- Carte Animal 2 -->
                <div class="col">
                    <div class="card animal-card">
                        <img src="/images/girafe.png" class="card-img-top" alt="Girafe">
                        <div class="card-body">
                            <h5 class="card-title">Girafe</h5>
                            <p class="card-text">Avec son long cou, la girafe est parfaitement adaptée pour se nourrir des feuilles des arbres les plus hauts. Elle incarne la grâce et la tranquillité.</p>
                            <ul>
                                <li>État : En bonne santé</li>
                                <li>Nourriture : Feuilles (10 kg)</li>
                                <li>Dernière visite vétérinaire : 02/01/2024</li>
                            </ul>
                        </div>
                    </div>
                </div>

                <!-- Carte Animal 3 -->
                <div class="col">
                    <div class="card animal-card">
                        <img src="/images/elephant.png" class="card-img-top" alt="Éléphant">
                        <div class="card-body">
                            <h5 class="card-title">Éléphant</h5>
                            <p class="card-text">L'éléphant, le plus grand mammifère terrestre, est une espèce essentielle pour l'écosystème de la savane grâce à son rôle dans la dispersion des graines.</p>
                            <ul>
                                <li>État : Bonne santé</li>
                                <li>Nourriture : Herbes et fruits (50 kg)</li>
                                <li>Dernière visite vétérinaire : 03/01/2024</li>
                            </ul>
                        </div>
                    </div>
                </div>

                <!-- Carte Animal 4 -->
                <div class="col">
                    <div class="card animal-card">
                        <img src="/images/zebre.png" class="card-img-top" alt="Zèbre">
                        <div class="card-body">
                            <h5 class="card-title">Zèbre</h5>
                            <p class="card-text">Avec ses rayures uniques, le zèbre est l'un des animaux les plus reconnaissables de la savane. Ses comportements sociaux fascinants en font un sujet d'étude captivant.</p>
                            <ul>
                                <li>État : En pleine santé</li>
                                <li>Nourriture : Herbes (20 kg)</li>
                                <li>Dernière visite vétérinaire : 04/01/2024</li>
                            </ul>
                        </div>
                    </div>
                </div>

                <!-- Carte Animal 5 -->
                <div class="col">
                    <div class="card animal-card">
                        <img src="/images/gazelle.png" class="card-img-top" alt="Gazelle">
                        <div class="card-body">
                            <h5 class="card-title">Gazelle</h5>
                            <p class="card-text">La gazelle est un animal agile et rapide, capable de se déplacer à grande vitesse pour échapper à ses prédateurs. Elle est essentielle pour la chaîne alimentaire de la savane.</p>
                            <ul>
                                <li>État : En pleine santé</li>
                                <li>Nourriture : Herbes et arbustes (15 kg)</li>
                                <li>Dernière visite vétérinaire : 05/01/2024</li>
                            </ul>
                        </div>
                    </div>
                </div>

                <!-- Carte Animal 6 -->
                <div class="col">
                    <div class="card animal-card">
                        <img src="/images/guepard.png" class="card-img-top" alt="Guépard">
                        <div class="card-body">
                            <h5 class="card-title">Guépard</h5>
                            <p class="card-text">Le guépard est l'animal terrestre le plus rapide, capable d'atteindre des vitesses impressionnantes pour attraper ses proies. Il est un symbole de la vitesse et de la puissance.</p>
                            <ul>
                                <li>État : Bonne santé</li>
                                <li>Nourriture : Viande (6 kg)</li>
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
                <h2 class="text-secondary">Faits intéressants sur la Savane</h2>
                <ul class="list-unstyled">
                    <li>La savane abrite certaines des espèces les plus emblématiques du monde, comme les lions et les éléphants.</li>
                    <li>Elle couvre environ 20% de la surface terrestre de l'Afrique.</li>
                    <li>Les feux de savane, bien que destructeurs, jouent un rôle clé dans le maintien de cet écosystème.</li>
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
