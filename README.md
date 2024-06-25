### Generating helpers

```bash
php artisan ide-helper:models
php artisan ide-helper:generate
```

### Mails

Je ne me suis pas embêté à mettre en place un environnement de développement pour les mails personnellement.
Si vous voulez tester la fonctionnalité d'envoi de mails sans en mettre un en place non plus, vous pouvez aller voir les mails envoyés dans le fichier `storage/logs/laravel.log`.

### Translations

Toutes les strings ne sont pas traduites, ce n'est pas l'objectif.
Mais vous pouvez voir comment ça fonctionne en allant voir :
- le directory `lang/fr/`, 
- les groups autour de mes routes dans `routes/web|auth.php`,
- et mon middleware `App\Http\Middleware\SetLocale` (enregistré dans `bootstrap/app.php`).
