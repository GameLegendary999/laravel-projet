# Steam-like - Initialisation du projet

## Étapes d'initialisation

1. **Installer les dépendances PHP**
   ```bash
   composer install
   ```

2. **Installer les dépendances JavaScript**
   ```bash
   npm install
   ```

3. **Configurer l'environnement**
   ```bash
   cp .env.example .env
   php artisan key:generate
   ```

4. **Configurer la base de données**
   ```bash
   php artisan migrate
   php artisan db:seed
   ```

5. **Lancer le serveur**
   ```bash
   php artisan serve
   ```

Le site sera accessible sur `http://localhost:8000`
