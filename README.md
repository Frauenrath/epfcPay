# EPFCpay – Plateforme de Ventes aux Enchères

C'est est une application web de ventes aux enchères développée dans le cadre du bachelier en Développement d'Applications à l'**EPFC** (Bruxelles). 

La plateforme permet aux utilisateurs de mettre des articles aux enchères, de parcourir les annonces disponibles et de participer activement aux enchères en ligne.

---

## Fonctionnalités Principales

* **Gestion des annonces :** Création, édition et gestion des offres de ventes aux enchères.
* **Système d'enchères :** Consultation des articles et participation aux enchères en temps réel.
* **Gestion des données :** Traitement sécurisé des opérations en base de données et suivi des transactions.
* **Architecture modulaire :** Séparation claire entre la logique métier, la gestion des données et l'interface utilisateur.

---

## Technologies Utilisées

* **Backend :** PHP 8
* **Architecture :** MVC (Modèle-Vue-Contrôleur)
* **Frontend :** HTML5, CSS3, Bootstrap 5, JavaScript / jQuery
* **Base de données :** MySQL / PostgreSQL
* **Serveur Web :** Apache

---

## Architecture du Projet

Le projet repose sur le patron de conception **MVC (Model-View-Controller)** pour garantir une maintenance aisée et une évolutivité du code :

* **Modèle (Model) :** Gestion de la logique métier, des requêtes SQL et de la persistance des données.
* **Vue (View) :** Interface utilisateur réactive et responsive conçue avec Bootstrap 5.
* **Contrôleur (Controller) :** Intermédiaire traitant les requêtes utilisateurs et synchronisant les données entre les modèles et les vues.