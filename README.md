
# JeelQuest Pre-Internship Task

## Description

Cette application web simple simule un workflow de gestion de tâches avec deux rôles : **Admin** et **Utilisateur**.

- L’Admin peut se connecter, voir la liste des utilisateurs, et leur assigner des tâches.
- L’Utilisateur peut s’inscrire, se connecter, voir ses tâches, et les marquer comme "Done".
- L’Admin peut vérifier le statut des tâches (terminées ou non).

---

## Technologies utilisées

- Backend : Laravel (PHP)
- Frontend : Blade Templates (Laravel)
- Tests E2E : Cypress

---

## Setup / Installation

1. **Cloner le projet :**

   ```bash
   git clone https://github.com/ton-utilisateur/jeelquest-task.git
   cd jeelquest-task
````

2. **Installer les dépendances PHP :**

   ```bash
   composer install
   ```

3. **Configurer l’environnement :**

   Copier `.env.example` en `.env` :

   ```bash
   cp .env.example .env
   ```

4. **Configurer la connexion à la base de données dans `.env` :**

   ```
   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=task_manager
   DB_USERNAME=root
   DB_PASSWORD=
   ```

5. **Générer la clé d’application :**

   ```bash
   php artisan key:generate
   ```

6. **Lancer les migrations et les seeders :**

   ```bash
   php artisan migrate --seed
   ```

7. **Démarrer le serveur local :**

   ```bash
   php artisan serve
   ```

---

## Comptes de test

| Rôle  | Email                                                | Mot de passe |
| ----- | ---------------------------------------------------- | ------------ |
| Admin | admin@gmail.com                                      | password     |
| User  | aya_test@example.com                                 | password     |

---

## Dossier des tests Cypress

* Les tests Cypress se trouvent dans : `cypress/e2e`

### Lancer les tests Cypress

1. Installer les dépendances Node (si pas déjà fait) :

   ```bash
   npm install
   ```

2. Lancer Cypress (interface graphique) :

   ```bash
   npx cypress open
   ```

3. Dans la fenêtre Cypress, lancer les tests situés dans `cypress/e2e`

---

## Scénarios de tests Cypress réalisés

* Un utilisateur peut s’inscrire (register).
* Un admin peut se connecter (login) et assigner une tâche à un utilisateur.
* L’utilisateur peut se connecter et marquer une tâche comme terminée.
* L’admin peut vérifier que la tâche a bien été marquée comme terminée.

---

Merci pour votre attention,
N’hésitez pas à me contacter en cas de questions.
Bonne lecture !


