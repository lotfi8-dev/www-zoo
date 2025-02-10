-- Création de la base de données
CREATE DATABASE IF NOT EXISTS zoo_arcadia;
USE zoo_arcadia;

-- 🔹 Table des utilisateurs (Admin, Employé, Vétérinaire)
CREATE TABLE IF NOT EXISTS utilisateurs (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(100) NOT NULL,
    email VARCHAR(191) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    role ENUM('Admin', 'Employé', 'Vétérinaire') NOT NULL,
    date_creation TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- 🔹 Ajout d'un admin par défaut pour `admin-dashboard.php`
INSERT INTO utilisateurs (nom, email, password, role) VALUES
('Admin Principal', 'admin@zoo.com', '$2y$10$XoPj3H6vYzt6TpIVqpI9hu.TPzQxDOb5cKcmh0XvRMWy7Y/mUHVKu', 'Admin');

-- 🔹 Table des habitats
CREATE TABLE IF NOT EXISTS habitats (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(255) NOT NULL,
    description TEXT NOT NULL,
    image VARCHAR(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- 🔹 Table des animaux
CREATE TABLE IF NOT EXISTS animaux (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(255) NOT NULL,
    espece VARCHAR(255) NOT NULL,
    description TEXT NOT NULL,
    image TEXT,
    etat_sante VARCHAR(255),
    alimentation VARCHAR(255),
    derniere_visite DATE,
    habitat_id INT NOT NULL,
    FOREIGN KEY (habitat_id) REFERENCES habitats(id) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- 🔹 Table des avis visiteurs
CREATE TABLE IF NOT EXISTS avis (
    id INT AUTO_INCREMENT PRIMARY KEY,
    pseudo VARCHAR(255) NOT NULL,
    utilisateur_id INT DEFAULT NULL,
    avis TEXT NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    is_approved BOOLEAN DEFAULT FALSE,
    FOREIGN KEY (utilisateur_id) REFERENCES utilisateurs(id) ON DELETE SET NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- 🔹 Table des messages de contact
CREATE TABLE IF NOT EXISTS contact_message (
    id INT AUTO_INCREMENT PRIMARY KEY,
    utilisateur_id INT DEFAULT NULL,
    title VARCHAR(255) NOT NULL,
    description TEXT NOT NULL,
    email VARCHAR(255) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (utilisateur_id) REFERENCES utilisateurs(id) ON DELETE SET NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- 🔹 Table des comptes rendus vétérinaires
CREATE TABLE IF NOT EXISTS comptes_rendus (
    id INT AUTO_INCREMENT PRIMARY KEY,
    id_animal INT NOT NULL,
    etat_sante TEXT NOT NULL,
    date DATE NOT NULL,
    commentaire TEXT,
    created_by INT NOT NULL,
    FOREIGN KEY (id_animal) REFERENCES animaux(id) ON DELETE CASCADE,
    FOREIGN KEY (created_by) REFERENCES utilisateurs(id) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- 🔹 Table des repas des animaux
CREATE TABLE IF NOT EXISTS nourriture (
    id INT AUTO_INCREMENT PRIMARY KEY,
    id_animal INT NOT NULL,
    type_nourriture VARCHAR(100) NOT NULL,
    quantite FLOAT NOT NULL,
    date_repas DATETIME NOT NULL,
    FOREIGN KEY (id_animal) REFERENCES animaux(id) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- 🔹 Table des consultations des animaux
CREATE TABLE IF NOT EXISTS consultations (
    id INT AUTO_INCREMENT PRIMARY KEY,
    id_animal INT NOT NULL,
    nombre_vues INT DEFAULT 0,
    last_viewed TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (id_animal) REFERENCES animaux(id) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Insérer les habitats
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
('Perroquet', 'Oiseau coloré.', '/images/perroquet.png', 'Fruits et noix (2 kg)', '2024-01-03', 2),
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
('Sanglier', 'Animal robuste.', '/images/sanglier.png', 'Racines et fruits (5 kg)', '2024-01-05', 4),
('Écureuil', 'Animal agile.', '/images/ecureuil.png', 'Noix et graines (1 kg)', '2024-01-06', 4);