# Symfony Demo refait en Laravel

Ce projet est une mini-refonte du projet Symfony Demo en Laravel.  
Il m'a servi à me lancer dans Laravel, et à voir les différences entre les deux frameworks.  

J'en ai d'ailleurs fait un [article sur le blog de Jolicode](https://jolicode.com/blog/retour-dexperience-dun-developpeur-symfony-qui-se-lance-sur-laravel) 😉

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

### Générer les helpers

Grâce à [barryvdh/laravel-ide-helper](https://github.com/barryvdh/laravel-ide-helper), vous pouvez générer des fichiers d'aide pour votre IDE.
Ce n'est pas obligatoire, mais ça m'a bien servi pour ce projet.

```bash
php artisan ide-helper:models
php artisan ide-helper:generate
```

### Mails

Je ne me suis pas embêté à mettre en place un environnement de développement pour les mails personnellement.
Si vous voulez tester la fonctionnalité d'envoi de mails sans en mettre un en place non plus, vous pouvez aller voir les mails envoyés dans le fichier `storage/logs/laravel.log`.

### Traductions

Tous les strings ne sont pas traduit, ce n'est pas l'objectif.
Mais vous pouvez voir comment ça fonctionne en allant voir :
- le directory `lang/fr/`, 
- les groups autour de mes routes dans `routes/web|auth.php`,
- et mon middleware `App\Http\Middleware\SetLocale` (enregistré dans `bootstrap/app.php`).

## Notes

Je n'ai pas fait de tests unitaires, ils utilisent PHPUnit et sont très similaires à ceux de Symfony.  

J'ai essayé au mieux de suivre les bonnes pratiques Laravel, mais je suis sûr qu'il y a des choses à améliorer. Grand merci aux contributeurs de ce repo : https://github.com/alexeymezenin/laravel-best-practices pour la liste des bonnes pratiques.

Et merci à JoliCode de m'avoir donné des jours à disposition pour faire ce projet ! 🎉
