# Zoo Arcadia - Guide de Démarrage

Bienvenue dans le projet **Zoo Arcadia**. Ce Readme vous guide à travers les étapes nécessaires pour configurer et exécuter le projet en utilisant **Docker** avec l'image **XAMPP**.

## 📌 Présentation du Projet

Zoo Arcadia est une application web permettant aux utilisateurs de **réserver des visites au zoo**. Elle offre une interface conviviale pour consulter les informations sur le zoo, les horaires, les tarifs, et effectuer des **réservations en ligne**. Il permet aussi aux vétérinaires et employés d'avoir un accès plus facile aux données du Zoo.

---

## 📋 Prérequis

Avant de commencer, assurez-vous d'avoir les éléments suivants installés sur votre machine :

- **Docker** : Assurez-vous que Docker est installé et en cours d'exécution sur votre système.

---

## ⚙️ Installation avec Docker

Nous allons utiliser l'image Docker **XAMPP** pour configurer notre environnement de développement. Cette image contient **Apache, MySQL, PHP et PHPMyAdmin**, ce qui facilite le déploiement de l'application.

### 🔹 Étapes d'Installation

### 1️⃣ Cloner le dépôt du projet

```bash
$ git clone https://github.com/lotfi8-dev/www-zoo.git
$ cd www-zoo
```

### 2️⃣ Configurer les volumes et les ports

Assurez-vous que votre projet est situé dans un répertoire spécifique sur votre machine. Par exemple, supposons que le projet est situé dans :
/chemin/vers/votre/projet

### 3️⃣ Exécuter le conteneur Docker

Utilisez la commande suivante pour démarrer le conteneur Docker avec les ports appropriés exposés et le volume monté :

```bash
$ docker run --name zoo_app8 -p 3306:3306 -p 41061:22 -p 41062:80 -d -v /chemin/vers/votre/projet:/opt/lampp/htdocs tomsik68/xampp:8
```

📌 Explication des options :
```bash
--name zoo_app8 : Nom du conteneur.
-p 3306:3306 : Expose le port MySQL.
-p 41061:22 : Expose le port SSH.
-p 41062:80 : Expose le port HTTP.
-d : Exécute le conteneur en arrière-plan.
-v /chemin/vers/votre/projet:/opt/lampp/htdocs : Monte le répertoire de votre projet dans le conteneur.
```

## 🛠️ Importer la Base de Données

Le projet contient un fichier de base de données situé dans le répertoire DB. Pour l'importer dans MySQL, suivez ces étapes :

- Accédez à PHPMyAdmin en naviguant vers :
👉 http://localhost:41062/phpmyadmin
- Connectez-vous avec les identifiants par défaut :
Utilisateur : root
Mot de passe : (laisser vide)
Créez une nouvelle base de données pour le projet.
Sélectionnez la base de données nouvellement créée.
Cliquez sur l'onglet "Importer" et téléchargez le fichier .sql situé dans le répertoire DB du projet.
Exécutez l'importation pour configurer les tables et les données nécessaires.
⚙️ Configurer les Paramètres de Connexion

- Assurez-vous que les paramètres de connexion à la base de données dans votre application correspondent aux informations de votre conteneur Docker.

## 🔹 Détails de connexion par défaut :
Hôte : localhost

Utilisateur : root

Mot de passe : (laisser vide)

Nom de la base de données : zoo_arcadia

## 🌍 Accéder à l'Application

Une fois le conteneur en cours d'exécution et la base de données configurée, vous pouvez accéder à l'application en naviguant vers :

👉 http://localhost:41062



