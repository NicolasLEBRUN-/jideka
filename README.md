# jideka

Pour installer ce projet, suivre les étapes suivantes :
- Installer **PHP** v7.1.8
- Installer **NodeJS** v6.10.3
- Installer **Composer** (pour les packages PHP)
- Installer **NPM** (pour les packages JavaScript)
- Installer **Laravel Framework** v5.4.36
- Lancer la commande `composer install`
- Lancer la commande `npm install`
- Installer **MySql** v5.6.35
- Créer une base de données intitulée "jideka" (à l'aide d'un client MySql, e.g. _Sequel Pro_)
- Créer un fichier _.env_ à la racine du projet, en copiant le fichier _.env.example_ 
- Générer une _APP_KEY_ avec la commande `php artisan key:generate`
- Configurer le fichier _.env_ à la racine du projet, avec notamment les informations sur la connection MySql ainsi que les informations sur Google Recaptcha
- Lancer la commande `php artisan migrate`
- Lancer la commande `php artisan migrate:refresh --seed`
- Lancer dans un onglet du _Terminal_ la commande `php artisan serve`
- Lancer dans un second onglet du _Terminal_ la commande `npm run watch`
- Visiter la page [localhost:8000](localhost:8000) (à l'aide d'un navigateur web, e.g. _Safari_) !
