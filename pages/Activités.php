<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Zoo Arcadia - Activités</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="/css/Activités.css">
</head>
<body>
    <!-- Barre de navigation -->
    <?php include '../include/navbar.php'; ?>

    <!-- Hero Section -->
    <header class="hero-section text-white text-center">
        <div class="container d-flex flex-column justify-content-center align-items-center h-100">
        <h1 class="display-4">Activités au Zoo Arcadia</h1>
        <p class="lead">Partagez des moments uniques avec vos proches, en découvrant les merveilles de la nature.</p>
    </div>
    </header>

    <!-- Introduction -->
    <section class="intro-section py-5 bg-light">
        <div class="container text-center">
            <h2 class="text-primary">Une expérience unique au cœur de la nature</h2>
            <p class="mt-4">Le Zoo Arcadia propose une variété d'activités adaptées à tous les âges. Que vous soyez amateur de découvertes, curieux de nature ou passionné d'aventures, nous avons une activité pour vous ! Explorez, apprenez et amusez-vous dans un cadre naturel exceptionnel.</p>
        </div>
    </section>
    <!-- Section Activités -->
    <section class="activities-section py-5">
        <div class="container">
            <h2 class="text-center text-primary mb-5">Nos Activités</h2>
            <div class="row g-4">
                <!-- Activité 1 -->
                <div class="col-md-4">
                    <div class="card activity-card">
                        <img src="/images/visite.png" class="card-img-top" alt="Visites Guidées">
                        <div class="card-body">
                            <h5 class="card-title">Visites Guidées</h5>
                            <p class="card-text">Explorez les habitats avec un guide expert.</p>
                            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalVisite">En savoir plus</button>
                        </div>
                    </div>
                </div>
                <!-- Modale pour Visites Guidées -->
                <div class="modal fade" id="modalVisite" tabindex="-1" aria-labelledby="modalVisiteLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="modalVisiteLabel">Visites Guidées</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <p>Découvrez nos habitats et nos animaux en compagnie de guides passionnés. Nos visites guidées offrent une perspective unique sur la vie sauvage.</p>
                                <ul>
                                    <li><strong>Durée :</strong> 1h30</li>
                                    <li><strong>Horaires :</strong> 10h, 14h, 16h</li>
                                    <li><strong>Inclus dans votre billet</strong></li>
                                </ul>
                            </div>
                            <div class="modal-footer">
                                <a href="/pages/Reservation.php" class="btn btn-success">Réservez maintenant</a>
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Activité 2 -->
                <div class="col-md-4">
                    <div class="card activity-card">
                        <img src="/images/resto.png" class="card-img-top" alt="Ateliers Éducatifs">
                        <div class="card-body">
                            <h5 class="card-title">Ateliers Éducatifs</h5>
                            <p class="card-text">Participez à des ateliers interactifs pour découvrir la nature.</p>
                            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalAtelier">En savoir plus</button>
                        </div>
                    </div>
                </div>
                <!-- Modale pour Ateliers Éducatifs -->
                <div class="modal fade" id="modalAtelier" tabindex="-1" aria-labelledby="modalAtelierLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="modalAtelierLabel">Ateliers Éducatifs</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <p>Rejoignez nos ateliers éducatifs pour en apprendre davantage sur la biodiversité et les efforts de conservation menés par le zoo.</p>
                                <ul>
                                    <li><strong>Durée :</strong> 1h</li>
                                    <li><strong>Pour tous les âges</strong></li>
                                    <li><strong>Inclus dans votre billet</strong></li>
                                </ul>
                            </div>
                            <div class="modal-footer">
                                <a href="Reservation.php" class="btn btn-success">Réservez maintenant</a>
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Activité 3 -->
                <div class="col-md-4">
                    <div class="card activity-card">
                        <img src="/images/train.png" class="card-img-top" alt="Tour en Train">
                        <div class="card-body">
                            <h5 class="card-title">Tour en Train</h5>
                            <p class="card-text">Profitez d'une visite panoramique en train.</p>
                            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalTrain">En savoir plus</button>
                        </div>
                    </div>
                </div>
                <!-- Modale pour Tour en Train -->
                <div class="modal fade" id="modalTrain" tabindex="-1" aria-labelledby="modalTrainLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="modalTrainLabel">Tour en Train</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <p>Admirez le zoo depuis notre train panoramique tout en découvrant nos habitats les plus emblématiques.</p>
                                <ul>
                                    <li><strong>Durée :</strong> 45 minutes</li>
                                    <li><strong>Départs toutes les 30 minutes</strong></li>
                                    <li><strong>Capacité :</strong> 20 personnes</li>
                                </ul>
                            </div>
                            <div class="modal-footer">
                                <a href="/pages/Reservation.php" class="btn btn-success">Réservez maintenant</a>
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
    <hr style="border: 3px solid #8d8787; margin: 20px 0;">

    <!-- Section Conclusion -->
    <section class="conclusion-section py-5 bg-light">
        <div class="container text-center">
            <h2 class="text-primary">Prêt à vivre une expérience inoubliable ?</h2>
            <p class="mt-4">Réservez dès maintenant vos places pour nos activités et faites partie de notre aventure dédiée à la nature et à la conservation.</p>
            <a href="/pages/Reservation.php" class="btn btn-primary btn-lg">Réserver une activité</a>
        </div>
    </section>

    <!-- Footer -->
    <?php include '../include/footer.php'; ?>
</body>
</html>
