#  Covoiturage - Laravel

Une application web de covoiturage local développée avec Laravel permettant aux conducteurs de proposer des trajets et aux passagers de consulter les trajets disponibles.

## 📖 À propos du projet

Cette application a été développée dans le cadre d'un projet académique visant à mettre en pratique les concepts fondamentaux de Laravel :

- Authentification et autorisation
- Relations entre modèles
- Validation des formulaires
- Gestion des fichiers et images
- Sécurisation des routes
- Architecture MVC

L'application facilite le partage de trajets quotidiens tout en favorisant la mobilité collaborative.

---

## ✨ Fonctionnalités

### 🔐 Authentification

- Inscription des utilisateurs
- Connexion sécurisée
- Déconnexion
- Gestion du profil utilisateur

### 👤 Gestion du profil

Chaque utilisateur peut :

- Consulter son profil
- Modifier son prénom
- Modifier son nom
- Modifier son numéro de téléphone

### 🚘 Gestion des véhicules

Chaque utilisateur peut enregistrer :

- Une photo du véhicule
- Le numéro de plaque
- Une description complète

Contraintes :

- Un seul véhicule par utilisateur
- Le véhicule doit être enregistré avant la création d'un trajet

### 🛣️ Gestion des trajets

#### Consultation publique

Tous les visiteurs peuvent consulter :

- Ville de départ
- Lieu de départ
- Ville d'arrivée
- Lieu d'arrivée
- Date du trajet
- Nombre de places disponibles
- Informations du conducteur
- Informations du véhicule

#### Création de trajet

Un utilisateur connecté peut :

- Ajouter un trajet
- Définir les villes de départ et d'arrivée
- Définir les lieux précis
- Choisir la date du trajet
- Définir le nombre de places disponibles

#### Gestion personnelle

Chaque conducteur peut :

- Voir ses trajets
- Supprimer ses trajets

---

## 🛡️ Sécurité

L'application implémente :

- Authentification Laravel
- Middleware de protection
- Protection CSRF
- Validation des données
- Gestion sécurisée des uploads d'images
- Contrôle d'accès basé sur le propriétaire des ressources

---

## 🏗️ Architecture du projet

```text
app/
├── Models
│   ├── User.php
│   ├── Vehicule.php
│   └── Trajet.php
│
├── Http/
│   ├── Controllers/
│   └── Middleware/

database/
├── migrations/

resources/
├── views/
│   ├── auth/
│   ├── profils/
│   ├── vehicules/
│   └── trajets/

routes/
├── web.php

storage/
└── app/public/
```

---

## 🛠️ Technologies utilisées

- Laravel
- PHP 8+
- MySQL
- Blade
- Bootstrap
- HTML5
- CSS3
- JavaScript

---

## ⚙️ Installation

### Cloner le dépôt

```bash
git clone https://github.com/votre-utilisateur/covoiturage-laravel.git
```

### Accéder au projet

```bash
cd covoiturage-laravel
```

### Installer les dépendances

```bash
composer install
```

### Copier le fichier d'environnement

```bash
cp .env.example .env
```

### Générer la clé d'application

```bash
php artisan key:generate
```

### Configurer la base de données

Modifier le fichier `.env`

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=covoiturage
DB_USERNAME=root
DB_PASSWORD=
```

### Exécuter les migrations

```bash
php artisan migrate
```

### Créer le lien de stockage

```bash
php artisan storage:link
```

### Lancer le serveur

```bash
php artisan serve
```

Accès :

```text
http://127.0.0.1:8000
```

---

## 🗃️ Base de données

### Users

| Champ | Type |
|---------|---------|
| id | bigint |
| prenom | string |
| nom | string |
| telephone | string |
| email | string |
| password | string |

### Vehicules

| Champ | Type |
|---------|---------|
| id | bigint |
| photo | string |
| plaque | string |
| description | text |
| user_id | foreign key |

### Trajets

| Champ | Type |
|---------|---------|
| id | bigint |
| ville_depart | string |
| lieu_depart | text |
| ville_arrivee | string |
| lieu_arrivee | text |
| date_trajet | datetime |
| places_disponibles | integer |
| user_id | foreign key |

---


##  Fonctionnalités bonus

- Pagination des trajets
- Recherche de trajets
- Filtrage par ville
- Filtrage par date
- Image par défaut pour les véhicules

---

##  Auteur

**Joyce Babake**

Étudiante en Informatique | Développeuse Web

GitHub : https://github.com/babakejoyce-wq

---

## 📄 Licence

Projet académique développé dans le cadre d'un apprentissage du framework Laravel.
