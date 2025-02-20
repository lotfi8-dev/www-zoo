# 🦡 Zoo Arcadia - Guide de Démarrage

Bienvenue dans le projet **Zoo Arcadia** ! Ce guide vous explique comment configurer et exécuter l'application en local, ainsi que les bonnes pratiques Git et les documents associés.

---

## 📌 Présentation du Projet

**Zoo Arcadia** est une plateforme de gestion pour un zoo. Elle permet :
- La **réservation de visites** en ligne.
- La **gestion des utilisateurs** (administrateurs, vétérinaires, visiteurs).
- La **modération des avis** laissés par les visiteurs.
- L'accès aux **données des animaux** pour les vétérinaires.

L'application suit une architecture **PHP/MySQL** avec **Bootstrap** pour le design et utilise **Docker** pour l’environnement de développement.

---

## 📋 Prérequis

Avant de commencer, assurez-vous d’avoir les éléments suivants installés :

- **Docker** 🐳 *(permet de virtualiser Apache, MySQL et PHP via XAMPP)*
- **Git** 🛠️ *(pour gérer le projet en version contrôlée)*
- **Un navigateur web** 🌍 *(Chrome, Firefox, Edge, etc.)*

---

## ⚙️ Installation avec Docker

### 🔹 1️⃣ Cloner le dépôt Git

```bash
$ git clone https://github.com/lotfi8-dev/www-zoo.git
$ cd www-zoo
```

### 🔹 2️⃣ Lancer l’application avec Docker

```bash
$ docker run --name zoo_app -p 3306:3306 -p 41061:22 -p 41062:80 -d -v $(pwd):/opt/lampp/htdocs tomsik68/xampp:8
```

### 🔹 3️⃣ Importer la base de données

1. **Accéder à PHPMyAdmin** :  
   👉 [http://localhost:41062/phpmyadmin](http://localhost:41062/phpmyadmin)
2. **Se connecter** avec :
   - **Utilisateur** : `root`
   - **Mot de passe** : *(laisser vide)*
3. **Créer la base de données** :  
   ```sql
   CREATE DATABASE zoo_arcadia;
   ```
4. **Importer le fichier SQL** (situé dans `/DB/zoo_arcadia_populated.sql`).

---

## 🚀 Accéder à l’Application

Une fois la base importée, ouvrez votre navigateur et accédez à :
👉 [http://localhost:41062](http://localhost:41062)

🔑 **Identifiants par défaut :**
- **Administrateur** : `admin@zoo.com` | `SecureAdmin123!`
- **Vétérinaire** : `vet1@zoo.com` | `VetPass789#`
- **Utilisateur** : `employee1@zoo.com` | `EmployeePass456$`

---

## 🏘️ Structure du Projet

```
📁 www-zoo
│── 📁 DB              # Fichiers SQL de création et intégration de données
│── 📁 include         # Fichiers PHP réutilisables (navbar, footer, etc.)
│── 📁 pages          # Pages principales de l'application
│── 📁 css            # Feuilles de style CSS
│── 📁 assets         # Images et icônes
│── README.md         # Guide d’installation et documentation
```

---

## 🏰 Bonnes Pratiques Git

Le projet suit une gestion rigoureuse avec **Git** :

1. **Branche principale** (`main`) : Contient le code stable et validé.
2. **Branche de développement** (`develop`) : Intègre les nouvelles fonctionnalités avant leur validation.
---

## 📂 Documentation Incluse

📂 **Fichiers fournis** :

✔️ **Base de données SQL** (`DB/zoo_arcadia.sql`)  
x **Manuel d’utilisation (PDF)** 📄  
x **Charte graphique (PDF)** 🎨 *(couleurs, police, wireframes, maquettes desktop & mobile)*  
x **Documentation projet (PDF)** 📝 *(Méthodologie, gestion des tâches, Kanban, etc.)*  
x **Documentation technique (PDF)** 🛠️ *(MCD, diagrammes UML, déploiement, etc.)*  

---