-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le : jeu. 20 fév. 2025 à 01:36
-- Version du serveur : 10.4.32-MariaDB
-- Version de PHP : 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `zoo_arcadia`
--

-- --------------------------------------------------------

--
-- Structure de la table `animal`
--

CREATE TABLE `animal` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `espece` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `image` text DEFAULT NULL,
  `etat_sante` varchar(255) DEFAULT NULL,
  `alimentation` varchar(255) DEFAULT NULL,
  `derniere_visite` date DEFAULT NULL,
  `habitat_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `animal`
--

INSERT INTO `animal` (`id`, `nom`, `espece`, `description`, `image`, `etat_sante`, `alimentation`, `derniere_visite`, `habitat_id`) VALUES
(1, 'Lion', '', 'Prédateur emblématique.', '/images/Lion.png', NULL, 'Viande (5 kg)', '2024-01-01', 1),
(2, 'Girafe', '', 'Animal au long cou.', '/images/girafe.png', NULL, 'Feuilles (10 kg)', '2024-01-02', 1),
(3, 'Éléphant', '', 'Mammifère terrestre géant.', '/images/elephant.png', NULL, 'Herbes et fruits (50 kg)', '2024-01-03', 1),
(4, 'Zèbre', '', 'Animal avec des rayures.', '/images/zebre.png', NULL, 'Herbes (20 kg)', '2024-01-04', 1),
(5, 'Gazelle', '', 'Animal rapide.', '/images/gazelle.png', NULL, 'Herbes et arbustes (15 kg)', '2024-01-05', 1),
(6, 'Guépard', '', 'Animal terrestre rapide.', '/images/guepard.png', NULL, 'Viande (6 kg)', '2024-01-06', 1),
(7, 'Tigre', '', 'Prédateur puissant.', '/images/tigre.png', NULL, 'Viande (6 kg)', '2024-01-01', 2),
(8, 'Singe', '', 'Animal agile et intelligent.', '/images/singe.png', NULL, 'Fruits et insectes (4 kg)', '2024-01-02', 2),
(9, 'Perroquet', '', 'Oiseau coloré.', '/images/perroquet.png', NULL, 'Fruits et noix (2 kg)', '2024-01-03', 2),
(10, 'Serpent', '', 'Reptile mystérieux.', '/images/serpent.png', NULL, 'Petits mammifères (2 kg)', '2024-01-04', 2),
(11, 'Léopard', '', 'Prédateur agile.', '/images/leopard.png', NULL, 'Viande (5 kg)', '2024-01-05', 2),
(12, 'Grenouille tropicale', '', 'Amphibien coloré.', '/images/grenouille.png', NULL, 'Insectes (1 kg)', '2024-01-06', 2),
(13, 'Castor', '', 'Ingénieur naturel.', '/images/castor.png', NULL, 'Écorce et branches (5 kg)', '2024-01-01', 3),
(14, 'Ibis Rouge', '', 'Oiseau coloré.', '/images/ibis.png', NULL, 'Insectes et crustacés (2 kg)', '2024-01-02', 3),
(15, 'Canard', '', 'Oiseau migrateur.', '/images/canard.png', NULL, 'Graines et petits poissons (3 kg)', '2024-01-03', 3),
(16, 'Loutre', '', 'Prédateur aquatique.', '/images/loutre.png', NULL, 'Poissons et mollusques (4 kg)', '2024-01-04', 3),
(17, 'Grenouille', '', 'Petit amphibien.', '/images/grenouille.png', NULL, 'Insectes et larves (1 kg)', '2024-01-05', 3),
(18, 'Héron', '', 'Chasseur patient.', '/images/heron.png', NULL, 'Poissons et amphibiens (5 kg)', '2024-01-06', 3),
(19, 'Cerf', '', 'Symbole de grâce.', '/images/cerf.png', NULL, 'Feuilles et herbes (5 kg)', '2024-01-01', 4),
(20, 'Loup', '', 'Prédateur social.', '/images/loup.png', NULL, 'Viande (6 kg)', '2024-01-02', 4),
(21, 'Renard', '', 'Animal rusé.', '/images/renard.png', NULL, 'Petits mammifères et fruits (4 kg)', '2024-01-03', 4),
(22, 'Hibou', '', 'Oiseau nocturne.', '/images/hibou.png', NULL, 'Rongeurs et insectes (2 kg)', '2024-01-04', 4),
(23, 'Sanglier', '', 'Animal robuste.', '/images/sanglier.png', NULL, 'Racines et fruits (5 kg)', '2024-01-05', 4),
(24, 'Écureuil', '', 'Animal agile.', '/images/ecureuil.png', NULL, 'Noix et graines (1 kg)', '2024-01-06', 4);

-- --------------------------------------------------------

--
-- Structure de la table `comptes_rendus`
--

CREATE TABLE `comptes_rendus` (
  `id` int(11) NOT NULL,
  `id_animal` int(11) NOT NULL,
  `etat_sante` text NOT NULL,
  `date` date NOT NULL,
  `commentaire` text DEFAULT NULL,
  `created_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `comptes_rendus`
--

INSERT INTO `comptes_rendus` (`id`, `id_animal`, `etat_sante`, `date`, `commentaire`, `created_by`) VALUES
(1, 15, 'Bonne santé (test)', '2025-02-19', 'test', 4);

-- --------------------------------------------------------

--
-- Structure de la table `consultations`
--

CREATE TABLE `consultations` (
  `id` int(11) NOT NULL,
  `id_animal` int(11) NOT NULL,
  `nombre_vues` int(11) DEFAULT 0,
  `last_viewed` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `contact_message`
--

CREATE TABLE `contact_message` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `email` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `habitat`
--

CREATE TABLE `habitat` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `habitat`
--

INSERT INTO `habitat` (`id`, `nom`, `description`, `image`) VALUES
(1, 'Savane', 'Vaste plaine herbeuse avec des animaux emblématiques.', '/images/savane.png'),
(2, 'Jungle', 'Forêt tropicale dense regorgeant de vie.', '/images/jungle.png'),
(3, 'Marais', 'Zone humide avec une biodiversité riche.', '/images/marais.png'),
(4, 'Forêt', 'Région boisée offrant un habitat à une biodiversité unique.', '/images/foret.png');

-- --------------------------------------------------------

--
-- Structure de la table `nourriture`
--

CREATE TABLE `nourriture` (
  `id` int(11) NOT NULL,
  `id_animal` int(11) NOT NULL,
  `type_nourriture` varchar(100) NOT NULL,
  `quantite` float NOT NULL,
  `date_repas` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `reservations`
--

CREATE TABLE `reservations` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `date_reservation` date NOT NULL,
  `nb_personnes` int(11) NOT NULL CHECK (`nb_personnes` > 0 and `nb_personnes` <= 20),
  `message` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `reservations`
--

INSERT INTO `reservations` (`id`, `nom`, `email`, `date_reservation`, `nb_personnes`, `message`, `created_at`, `updated_at`) VALUES
(2, 'Visiteur test', 'viiiii@zoo.com', '2025-04-04', 2, 'Pas de demandes', '2025-02-19 13:49:33', '2025-02-19 13:49:33'),
(3, 'Visitor test', 'viiii@zoo.com', '2025-04-11', 1, 'Pas de demandes particulières', '2025-02-19 13:50:33', '2025-02-19 13:50:33');

-- --------------------------------------------------------

--
-- Structure de la table `review`
--

CREATE TABLE `review` (
  `id` int(11) NOT NULL,
  `pseudo` varchar(255) NOT NULL,
  `avis` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `is_approved` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `review`
--

INSERT INTO `review` (`id`, `pseudo`, `avis`, `created_at`, `is_approved`) VALUES
(1, 'Test', 'Good zoo!', '2025-02-19 22:50:05', 1),
(2, 'Yes', 'This zoo is definitely a nice zoo!', '2025-02-19 23:31:48', 1);

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(50) NOT NULL CHECK (`role` in ('admin','employee','vet')),
  `status` enum('active','inactive') DEFAULT 'active',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `role`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Admin User', 'admin@zoo.com', '$2y$10$Tb7dQIoMSzfWYUaHZ3CJJ.Mrxk.iJT2ojkeAS1KhU9lW2B4mbNZgG', 'admin', 'active', '2025-02-18 16:44:31', '2025-02-18 16:44:31'),
(2, 'Employee One', 'employee1@zoo.com', '$2y$10$jxE5c.BUlxs7BkGB3mDV2O2WV25AbtKr5ffrPjq9CUW4S./N2ONei', 'employee', 'active', '2025-02-18 16:44:31', '2025-02-18 16:44:31'),
(3, 'Employee Two', 'employee2@zoo.com', '$2y$10$bWebziAJVrIeR6ib3MwXVueRvFmn90F8mvEv/9Az9TZy8cgIZZGoi', 'employee', 'active', '2025-02-18 16:44:31', '2025-02-18 16:44:31'),
(4, 'Vet One', 'vet1@zoo.com', '$2y$10$hy4yB1gNsfGkH65gCbWtIeNUsQZ1NvPwnabbUB1g9q4tMiyJUpivW', 'vet', 'active', '2025-02-18 16:44:31', '2025-02-18 16:44:31'),
(5, 'Vet Two', 'vet2@zoo.com', '$2y$10$EZwPwVTG/YiMMpJtI6Qu3.Da7bKdiFVHVHH4RFKzA2S6/EXoJAs9m', 'vet', 'active', '2025-02-18 16:44:31', '2025-02-18 16:44:31');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `animal`
--
ALTER TABLE `animal`
  ADD PRIMARY KEY (`id`),
  ADD KEY `habitat_id` (`habitat_id`);

--
-- Index pour la table `comptes_rendus`
--
ALTER TABLE `comptes_rendus`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_animal` (`id_animal`),
  ADD KEY `created_by` (`created_by`);

--
-- Index pour la table `consultations`
--
ALTER TABLE `consultations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_animal` (`id_animal`);

--
-- Index pour la table `contact_message`
--
ALTER TABLE `contact_message`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `habitat`
--
ALTER TABLE `habitat`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `nourriture`
--
ALTER TABLE `nourriture`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_animal` (`id_animal`);

--
-- Index pour la table `reservations`
--
ALTER TABLE `reservations`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `review`
--
ALTER TABLE `review`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `animal`
--
ALTER TABLE `animal`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT pour la table `comptes_rendus`
--
ALTER TABLE `comptes_rendus`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `consultations`
--
ALTER TABLE `consultations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `contact_message`
--
ALTER TABLE `contact_message`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `habitat`
--
ALTER TABLE `habitat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `nourriture`
--
ALTER TABLE `nourriture`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `reservations`
--
ALTER TABLE `reservations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `review`
--
ALTER TABLE `review`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `animal`
--
ALTER TABLE `animal`
  ADD CONSTRAINT `animal_ibfk_1` FOREIGN KEY (`habitat_id`) REFERENCES `habitat` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `comptes_rendus`
--
ALTER TABLE `comptes_rendus`
  ADD CONSTRAINT `comptes_rendus_ibfk_1` FOREIGN KEY (`id_animal`) REFERENCES `animal` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `comptes_rendus_ibfk_2` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `consultations`
--
ALTER TABLE `consultations`
  ADD CONSTRAINT `consultations_ibfk_1` FOREIGN KEY (`id_animal`) REFERENCES `animal` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `nourriture`
--
ALTER TABLE `nourriture`
  ADD CONSTRAINT `nourriture_ibfk_1` FOREIGN KEY (`id_animal`) REFERENCES `animal` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
