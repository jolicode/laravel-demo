<?php

return [
    'note' => 'REMARQUE',
    'tip' => 'ASTUCE',
    'not_available' => 'Indisponible',
    'mit_license' => 'Licence MIT',
    'http_error' => [
        'name' => 'Erreur :status_code, nombre',
        'description' => 'Il y a eu une erreur inconnue (HTTP :status_code, nombre) qui a empêché de compléter votre demande.',
        'suggestion' => 'Essayez de recharger cette page dans quelques minutes ou <a href=":url">revenez à la page d\'accueil</a>.',
        '403' => [
            'description' => "Vous n'avez pas la permission d'accéder à cette ressource.",
            'suggestion' => 'Demandez à votre responsable ou administrateur système de vous accorder l\'accès à cette ressource.',
        ],
        '404' => [
            'description' => "Nous n'avons pas pu trouver la page que vous avez demandée.",
            'suggestion' => 'Vérifiez s\'il y a une faute de frappe dans l\'URL ou <a href=":url">revenez à la page d\'accueil</a>.',
        ],
        '500' => [
            'description' => 'Il y a eu une erreur interne du serveur.',
            'suggestion' => 'Essayez de recharger cette page dans quelques minutes ou <a href=":url">revenez à la page d\'accueil</a>.',
        ],
    ],
    'title' => [
        'homepage' => 'Bienvenue sur l\'application <strong>Laravel Demo</strong>',
        'source_code' => 'Code source utilisé pour rendre cette page',
        'controller_code' => 'Code du contrôleur',
        'twig_template_code' => 'Code du modèle Twig',
        'login' => 'Connexion sécurisée',
        'post_list' => 'Liste des articles',
        'edit_post' => 'Modifier l\'article #:id, nombre',
        'add_comment' => 'Ajouter un commentaire',
        'comment_error' => 'Il y a eu une erreur lors de la publication de votre commentaire',
        'edit_user' => 'Modifier l\'utilisateur',
        'change_password' => 'Changer le mot de passe',
    ],
    'action' => [
        'browse_app' => 'Parcourir l\'application',
        'browse_admin' => 'Parcourir l\'administration',
        'show' => 'Afficher',
        'show_post' => 'Afficher l\'article #:id, nombre',
        'edit' => 'Modifier',
        'edit_post' => 'Modifier l\'article',
        'add' => 'Ajouter',
        'delete' => 'Supprimer',
        'delete_post' => 'Supprimer l\'article',
        'delete_comment' => 'Supprimer le commentaire',
    ],
    'label' => [
        'save' => 'Sauvegarder',
        'save_and_exit' => 'Sauvegarder et quitter',
        'title' => 'Titre',
        'content' => 'Contenu',
        'author' => 'Auteur',
        'published_at' => 'Publié le',
        'published' => 'Publié',
        'not_published' => 'Non publié',
        'actions' => 'Actions',
    ],
    'message' => [
        'saved' => 'Enregistré avec succès!',
        'deleted' => 'Supprimé avec succès!',
        'error' => 'Il y a eu une erreur lors du traitement de votre demande.',
        'confirmation' => 'Êtes-vous sûr de vouloir continuer?',
        'no_results' => 'Aucun résultat trouvé.',
    ],
    'notification' => [
        'post_saved' => 'Article enregistré avec succès!',
        'post_deleted' => 'Article supprimé avec succès!',
        'comment_saved' => 'Commentaire enregistré avec succès!',
        'comment_deleted' => 'Commentaire supprimé avec succès!',
    ],
    'help' => [
        'app_description' => 'Ceci est une application de démonstration créée avec Laravel.',
        'show_code' => 'Cliquez sur le bouton ci-dessous pour voir le code source du <strong>contrôleur</strong> et du <strong>modèle Twig</strong> utilisés pour rendre cette page.',
        'browse_app' => 'Parcourez <strong>l\'application</strong> pour voir les articles et les commentaires.',
        'browse_admin' => 'Parcourez <strong>le back-office</strong> pour gérer les articles et les commentaires.',
        'login_users' => 'Utilisez l\'un des utilisateurs suivants pour vous connecter:',
        'role_user' => 'utilisateur régulier',
        'role_admin' => 'administrateur',
        'reload_fixtures' => 'Si vous ne trouvez pas d\'utilisateur avec lequel vous connecter, rechargez les fixtures en exécutant cette commande:',
        'add_user' => 'Créez un nouvel utilisateur en exécutant cette commande:',
        'more_information' => 'Pour plus d\'informations, consultez la documentation officielle de Laravel.',
        'post_summary' => 'Résumé de l\'article',
        'post_publication' => 'Publier l\'article',
        'post_content' => 'Contenu de l\'article',
        'comment_content' => 'Les commentaires ne peuvent pas contenir de contenu Markdown ou HTML; seulement du texte brut.',
    ],
    'info' => [
        'post_created' => 'Créez un article et partagez-le avec votre communauté.',
        'post_updated' => 'Mettez à jour l\'article avec de nouvelles informations ou corrigez les erreurs.',
        'post_deleted' => 'Supprimez l\'article si vous ne voulez plus qu\'il soit visible.',
        'comment_deleted' => 'Supprimez les commentaires qui ne respectent pas notre code de conduite.',
    ],
    'rss' => [
        'title' => 'Blog Laravel Demo',
        'description' => 'Les articles les plus récents publiés sur le blog Laravel Demo',
    ],
    'paginator' => [
        'previous' => 'Précédent',
        'next' => 'Suivant',
        'current' => '(actuel)',
    ],
    'nav' => [
        'log_out' => 'Déconnexion',
        'account' => 'Compte',
        'login' => 'Connexion',
        'search' => 'Chercher',
        'blog' => 'Blog',
        'backend' => 'Back-office',
        'profile' => 'Profile',
        'post_list' => 'Liste des articles',
    ],
];
