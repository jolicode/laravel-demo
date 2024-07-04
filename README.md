# Symfony Demo refait en Laravel

Ce projet est une mini-refonte du projet Symfony Demo en Laravel.  
Il m'a servi à me lancer dans Laravel, et à voir les différences entre les deux frameworks.  

J'en ai d'ailleurs fait un [article sur le blog de Jolicode](https://jolicode.com/blog/retour-dexperience-dun-developpeur-symfony-qui-decouvre-laravel) 😉

## Installation

### Prérequis

- PHP ^8.3
- Composer
- NPM

### Installation

```bash
composer install
npm install
npm run build
php artisan migrate
php artisan db:seed
```

### Configuration

```bash
cp .env.example .env
```

### Lancer le serveur

```bash
php artisan serve
npm run dev # pour compiler les assets
```

### Se connecter

Les utilisateurs de base doivent être créés via la commande `php artisan db:seed` pour pouvoir se connecter.  
Il est possible d'en créer d'autres via la commande `php artisan app:add-user`.

Les utilisateurs de base sont :

| Username     | Password | Rôle   |
|:-------------|:---------|:-------|
| `jane_admin` | `kitten` | Admin  |
| `tom_admin`  | `kitten` | Admin  |
| `john_user`  | `kitten` | User   |

### Générer les helpers

Grâce à [barryvdh/laravel-ide-helper](https://github.com/barryvdh/laravel-ide-helper), vous pouvez générer des fichiers d'aide pour votre IDE.
Ce n'est pas obligatoire, mais ça m'a bien servi pour ce projet.

```bash
php artisan ide-helper:models
php artisan ide-helper:generate
```

### CS & QA

```bash
./vendor/bin/pint # Version de cs-fixer propre à Laravel
./vendor/bin/phpstan  
```

### Mails

Je n'ai pas mis en place d'environnement de développement pour les mails de mon côté.
Si vous voulez tester la fonctionnalité d'envoi de mails sans en mettre un en place non plus, vous pouvez aller voir les mails envoyés dans le fichier `storage/logs/laravel.log`.

### Traductions

Tous les strings ne sont pas traduit, ce n'est pas l'objectif.
Mais vous pouvez voir comment ça fonctionne en allant voir :
- le directory `lang/fr/`, 
- les groups autour de mes routes dans `routes/web.php` et `routes/auth.php`,
- et mon middleware `App\Http\Middleware\SetLocale` (enregistré dans `bootstrap/app.php`).

## Notes

J'ai essayé au mieux de suivre les bonnes pratiques Laravel, mais je suis sûr qu'il y a des choses à améliorer. Grand merci aux contributeurs de ce repo : https://github.com/alexeymezenin/laravel-best-practices pour la liste des bonnes pratiques.

Et merci à JoliCode de m'avoir donné des jours à disposition pour faire ce projet ! 🎉
