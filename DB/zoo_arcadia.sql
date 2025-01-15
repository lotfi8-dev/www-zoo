-- Création de la base de données
CREATE DATABASE IF NOT EXISTS zoo_arcadia;
USE zoo_arcadia;

-- Table habitats
-- Contient les informations sur les différents habitats
CREATE TABLE habitat (
    id INT AUTO_INCREMENT PRIMARY KEY, -- Identifiant unique pour chaque habitat
    nom VARCHAR(255) NOT NULL, -- Nom de l'habitat
    description TEXT NOT NULL, -- Description de l'habitat
    image VARCHAR(255) NOT NULL -- URL de l'image représentant l'habitat
);

-- Table animaux
-- Contient les informations sur les animaux du zoo
CREATE TABLE animal (
    id INT AUTO_INCREMENT PRIMARY KEY, -- Identifiant unique pour chaque animal
    nom VARCHAR(255) NOT NULL, -- Nom de l'animal
    espece VARCHAR(255) NOT NULL, -- Espèce de l'animal
    description TEXT NOT NULL, -- Description détaillée de l'animal
    image TEXT, -- Liste des URLs des images de l'animal (au format JSON)
    etat_sante VARCHAR(255), -- État de santé de l'animal
    alimentation VARCHAR(255), -- Type d'alimentation de l'animal
    derniere_visite DATE, -- Dernière date de visite par un vétérinaire
    habitat_id INT NOT NULL, -- Référence à l'habitat auquel appartient l'animal
    FOREIGN KEY (habitat_id) REFERENCES habitat(id) ON DELETE CASCADE -- Supprimer les animaux si l'habitat est supprimé
);

-- Table utilisateurs
-- Contient les informations des utilisateurs (administrateurs, employés, vétérinaires)
CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY, -- Identifiant unique pour chaque utilisateur
    email VARCHAR(191) NOT NULL UNIQUE, -- Email utilisé comme identifiant
    password VARCHAR(255) NOT NULL, -- Mot de passe (haché pour la sécurité)
    role ENUM('admin', 'employee', 'vet') NOT NULL -- Rôle de l'utilisateur (administrateur, employé, vétérinaire)
);

////////////// insertion admin vet emp 

-- Table avis -- Contient les avis laissés par les visiteurs
CREATE TABLE review (
    id INT AUTO_INCREMENT PRIMARY KEY, -- Identifiant unique pour chaque avis
    pseudo VARCHAR(255) NOT NULL, -- Pseudo du visiteur qui laisse l'avis
    avis TEXT NOT NULL, -- Contenu de l'avis
    is_approved BOOLEAN DEFAULT FALSE -- Indique si l'avis est validé par un employé
);

-- Table messages de contact -- Stocke les messages envoyés via le formulaire de contact
CREATE TABLE contact_message (
    id INT AUTO_INCREMENT PRIMARY KEY, -- Identifiant unique pour chaque message
    title VARCHAR(255) NOT NULL, -- Titre du message
    description TEXT NOT NULL, -- Contenu du message
    email VARCHAR(255) NOT NULL, -- Email du visiteur
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP -- Date et heure de création du message
);

-- Insérer les habitats---
INSERT INTO habitat (nom, description, image) VALUES
('Savane', 'Vaste plaine herbeuse avec des animaux emblématiques.', '/images/savane.png'),
('Jungle', 'Forêt tropicale dense regorgeant de vie.', '/images/jungle.png'),
('Marais', 'Zone humide avec une biodiversité riche.', '/images/marais.png'),
('Forêt', 'Région boisée offrant un habitat à une biodiversité unique.', '/images/foret.png');

-- Insérer les animaux
INSERT INTO animal (nom, description, image, alimentation, derniere_visite, habitat_id) VALUES
-- Savane
('Lion', 'Prédateur emblématique.', '/images/Lion.png', 'Viande (5 kg)', '2024-01-01', 1),
('Girafe', 'Animal au long cou.', '/images/girafe.png', 'Feuilles (10 kg)', '2024-01-02', 1),
('Éléphant', 'Mammifère terrestre géant.', '/images/elephant.png', 'Herbes et fruits (50 kg)', '2024-01-03', 1),
('Zèbre', 'Animal avec des rayures.', '/images/zebre.png', 'Herbes (20 kg)', '2024-01-04', 1),
('Gazelle', 'Animal rapide.', '/images/gazelle.png', 'Herbes et arbustes (15 kg)', '2024-01-05', 1),
('Guépard', 'Animal terrestre rapide.', '/images/guepard.png', 'Viande (6 kg)', '2024-01-06', 1),
-- Jungle
('Tigre', 'Prédateur puissant.', '/images/tigre.png', 'Viande (6 kg)', '2024-01-01', 2),
('Singe', 'Animal agile et intelligent.', '/images/singe.png', 'Fruits et insectes (4 kg)', '2024-01-02', 2),
('Perroquet', 'Oiseau coloré.', '/images/perrroquet.png', 'Fruits et noix (2 kg)', '2024-01-03', 2),
('Serpent', 'Reptile mystérieux.', '/images/serpent.png', 'Petits mammifères (2 kg)', '2024-01-04', 2),
('Léopard', 'Prédateur agile.', '/images/leopard.png', 'Viande (5 kg)', '2024-01-05', 2),
('Grenouille tropicale', 'Amphibien coloré.', '/images/grenouille.png', 'Insectes (1 kg)', '2024-01-06', 2),
-- Marais
('Castor', 'Ingénieur naturel.', '/images/castor.png', 'Écorce et branches (5 kg)', '2024-01-01', 3),
('Ibis Rouge', 'Oiseau coloré.', '/images/ibis.png', 'Insectes et crustacés (2 kg)', '2024-01-02', 3),
('Canard', 'Oiseau migrateur.', '/images/canard.png', 'Graines et petits poissons (3 kg)', '2024-01-03', 3),
('Loutre', 'Prédateur aquatique.', '/images/loutre.png', 'Poissons et mollusques (4 kg)', '2024-01-04', 3),
('Grenouille', 'Petit amphibien.', '/images/grenouille.png', 'Insectes et larves (1 kg)', '2024-01-05', 3),
('Héron', 'Chasseur patient.', '/images/heron.png', 'Poissons et amphibiens (5 kg)', '2024-01-06', 3),
-- Forêt
('Cerf', 'Symbole de grâce.', '/images/cerf.png', 'Feuilles et herbes (5 kg)', '2024-01-01', 4),
('Loup', 'Prédateur social.', '/images/loup.png', 'Viande (6 kg)', '2024-01-02', 4),
('Renard', 'Animal rusé.', '/images/renard.png', 'Petits mammifères et fruits (4 kg)', '2024-01-03', 4),
('Hibou', 'Oiseau nocturne.', '/images/hibou.png', 'Rongeurs et insectes (2 kg)', '2024-01-04', 4),
('Sanglier', 'Animal robuste.', '/images/sanglier1.png', 'Racines et fruits (5 kg)', '2024-01-05', 4),
('Écureuil', 'Animal agile.', '/images/ecureuil.png', 'Noix et graines (1 kg)', '2024-01-06', 4);
