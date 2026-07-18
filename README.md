# Parc Informatique — Gestion IT

Application web de gestion de parc informatique développée avec Laravel. Elle permet de centraliser le suivi des emplacements, machines, composants, matériels, logiciels et utilisateurs d'une organisation.

## Fonctionnalités

- Authentification administrateur (connexion / déconnexion sécurisées)
- Tableau de bord avec statistiques en temps réel et alertes de licences arrivant à expiration
- Gestion complète (création, consultation, modification, suppression) de 7 modules :
  - Emplacements
  - Modèles d'appareils
  - Utilisateurs du parc
  - Machines
  - Composants
  - Matériels
  - Logiciels
- Relations entre modules (machine ↔ modèle, machine ↔ emplacement, logiciel ↔ machine, etc.)
- Interface responsive avec Bootstrap 5

## Stack technique

- **Backend** : Laravel 13, PHP 8.5
- **Base de données** : MySQL
- **Frontend** : Blade, Bootstrap 5, Bootstrap Icons

## Installation

```bash
git clone <url-du-depot>
cd parc-informatique-pro
composer install
cp .env.example .env
php artisan key:generate
```

Configurer les identifiants de la base de données dans `.env`, puis :

```bash
php artisan migrate
php artisan db:seed
php artisan serve
```

Se connecter avec le compte administrateur créé par le seeder (voir `database/seeders/AdminSeeder.php`).

## Auteur

Développé par Marie-Caren Emmy KINDOZOUN.