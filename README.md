<p align="center"><img src="https://res.cloudinary.com/dtfbvvkyp/image/upload/v1566331377/laravel-logolockup-cmyk-red.svg" width="400"></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/d/total.svg" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/v/stable.svg" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/license.svg" alt="License"></a>
</p>

# Projet de création d’une application web (Blog)

### Préambule 
Dans le cadre de notre projet en programmation web côté serveur pour l’année 2019-2020, nous avons développé un blog en utilisant le Framework Laravel. Ce Blog permet aux utilisateurs d’écrire et de consulter des articles. Bien entendu un utilisateur peut s’enregistrer et devenir un membre actif du blog.

### Installation du projet
#### a. Télécharger ou cloner le projet
Se rendre directement sur https://github.com/madhouny/Vblog. Deux possibilités s’offrent à nous le téléchargement ou le clonage.
Pour le clonage il suffit d’utiliser la commande : **git clone https://github.com/madhouny/Vblog.git**
### b. Se rendre dans le dossier de l’application
Utiliser la commande : **cd Vblog**
### c. Installation des dépendances du projet à partir de composer
Chaque fois que nous clonons un nouveau projet, il faut installer toutes les dépendances du projet. Ça permet d’installer Laravel lui même ainsi que d’autres paquets pour démarrer l’application.
Utiliser la commande : **composer install**
### d. Copie du fichier .env
Ici, nous allons faire une copie du fichier .env.example et créer un fichier .env que nous allons pouvoir remplir avec nos paramètres de configuration.
Sous linux utiliser la commande : **cp .env.example .env**
Sinon sous Windows utiliser la commande : **copy .env.example .env**
### e. Générer la clé d’encryption
Lavarel a besoin d’une clé d’encryption pour chacune de nos applications. Cette clé est générée aléatoirement et est stockée dans le fichier .env
Utilisation de la commande : **php artisan key:generate**

### f. Création d’une base de donnée vide pour le projet
Pour cela il faut se placer dans **..\Vblog\database**
Toujours avec la même commande vue au dessus pour changer de dossier : **cd database**
Sous Linux pour créer un fichier, utiliser la commande : **touch database.sqlite**
Sous Windows pour créer un fichier, utiliser la commande : **type nul > database.sqlite**
### g. Ouvrir le fichier .env
Il nous faut ouvrir le fichier .env et modifier deux champs. Ce dernier se trouve dans ..\Vblog\
Pour revenir dans le dossier d’avant, utiliser la commande : **cd ..**
Pour ouvrir le fichier .env :
Sous Linux utiliser la commande : **gedit .env**
Sous Windows utiliser la commande : **notepad .env**
A partir de là, deux lignes nous intéresse et nous allons les modifier :
**Avant**

    DB_CONNECTION=mysql
    DB_DATABASE=laravel
**Après** 

    DB_CONNECTION=sqlite
    DB_DATABASE=/chemin/absolu/de/database.sqlite


### h. Ajout des tables et contenus de la base de donnée avec la migration
Les migrations dans Laravel permettent d’avoir toute l’architecture de la base de données. Normalement nous somme toujours dans **..\Vblog\**
Sous linux ou Windows utiliser la commande : **php artisan migrate**
Sous Linux ou Windows, utiliser la commande : **php artisan migrate:fresh --seed**
### i. Lancement du server Artisan
Il nous reste plus qu'à lancer le serveur.
Utiliser la commande sous Linux ou Windows : **php artisan serve** 
Puis ouvrir un navigateur et entrer http://127.0.0.1:8000/

### Installation Git / github
Après avoir créé un repository sur github, voici les commandes utilisées à chaque progression du projet : git init ; git status ; git add ; git commit -m ; git push origin master     

### Structure du Blog ( Views Folder ) 
Dossier Pages qui englobe toutes les pages statiques Welcome, Contact et About
Dossier Partials comporte les fichiers blade suivant : la barre de navigation, le header (On trouve tous les liens vers le CSS et Bootstrap), messages (management des erreurs), JS (Script javascript ) et Footer. Dossier des différentes fonctionnalités qu’on a ajoutées : auth ; posts ; users ; categories ; comments ; tags 
Fichier Main.blade : il contient la structure générale HTML du blog où toutes les pages héritent ce fichier. @include ; @yield 


### Model et migration
Tous les Models ont été créés par la commande Php artisan make :model –m
Les commandes utilisées dans la migration et la création des tables : 
**php artisan migrate** et **php artisan make :migration create – ... – table** 
Voici les différents models utilisés : Post , Comment , Category , Tag  ,Role , User
Ces models contiennent les différents Eloquent: Relationships et les associations entre les tables. One To One , One To Many ,Many To Many

### CRUD et Controlllers 
La plupart des Controllers ont été créés par la commande **php artisan make :controller -resource** , ce qui signifie la création du CRUD     fontions (index, create , show , edit , update , destroy ) 
les différentes fonctions utilisent un système de la validation des données fixée dans les règles de validation dans chaque controller.
La Commande **php artisan route:list** affichera le domaine, la méthode, l'URI, le nom, l'action pour l’ensembles des routes définies.
Également au moment de modifier un article  ou lorsqu'un message d’erreur s’affichera, les champs garderont leur contenu afin de faire une modification ou un changement.
Un Système de pagination est mis en oeuvre, ainsi qu'une option de tri des articles, par exemple le dernier article sera celui qui va s’afficher en premier.

### Laravel Collections
Utilisation des packages LaravelCollections dans la création des Formulaires, la commande     utilisée est : **composer require laravelcollective/html**
### Javascript et Validations 
On a utilisé la bibliothèque de validation de formulaires javascript PARSLEYJS.org , elle     permet  de fournir aux utilisateurs un retour d'information sur la soumission de leur formulaire avant de l'envoyer à votre serveur. Dans le dossier public vous trouverez les deux fichier CSS et Javascript liés à cette bibliothèque. 

### Session et Flash Message
Dans le dossier partials /messages : Vous trouverez le code correspondant à cette partie, elle sert à afficher des messages de succès ou d’erreurs aux utilisateurs.  
Par exemple au moment de l’ajout ou de la modification voir même de la suppression d’un article, de manière générale au niveau du CRUD des articles, catégories, tags et aussi au moment de l’enregistrement. 

### Authentifications 
Les commandes utilisées : 
**composer require laravel/ui**
**php artisan ui vue –auth**
Cette commande installera une vue de disposition, des vues d'enregistrements et de connexions, ainsi que des routes pour tous les points finaux d'authentifications.
Le paquet laravel/ui génère également plusieurs contrôleurs d'authentification pré-construits, qui sont situés dans l'espace de noms App\Http\Controllers\Auth.
Ainsi pour s’enregistrer, des règles de validations ont été ajoutées. Par exemple, le mot de pass doit être au minimum de 8 caractères, et le rôle User est attribué poue les nouveaux utilisateurs (par défault). 

### Middleware et Protections des Routes
Dans le dossier routes/web, vous trouverez tous les middleware utilisés. Il faudrait d’abord   s’authentifier pour accéder à certaines fonctionnalités tels que : la gestion des articles, la liste des utilisateurs, la gestions des Tags et Catégories. Dans certains CRUD, les middlewares ont été fait dans les constructeurs de chaque Controllers,

### Fonctionnalités Tags
Pour bien utilisés les tags aux postes , on a pu utiliser l’environnement Selec2.org qui  offre une boîte de sélection personnalisable avec un support pour la recherche, le marquage, les ensembles de données à distance, le défilement infini, et de nombreuses autres options très utilisées. 
Voici les scripts à inclure pour cette fonctionnalité : 

    <link     href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.c    ss" rel="stylesheet" />
    <script     src=https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.min.js    ></script>
Le PostController et le TagController utilisent les helpers methods : attach, detach and sync , afin d'ajouter un certain degré de commodité pour les relations de type "Many To Many".

### Envoyer les Emails via Contact Form
La fonction  utilisée : Mail::send('view', $data, function())
 se trouve dans le PageController. 
Cette Fonctionnalité nous a permis d’utiliser Mailtrap.io , et le protocole SMTP après avoir généré une API et l’inclure dans le fichier.env , pour envoyer et recevoir les emails , voici un exemple : 

    MAIL_MAILER=smtp
    MAIL_HOST=smtp.mailtrap.io
    MAIL_PORT=2525
    MAIL_USERNAME=616932d6089574
    MAIL_PASSWORD=b51bc9933be688
    MAIL_ENCRYPTION=null
    MAIL_FROM_ADDRESS=younes.madhoun@gmail.com
    MAIL_FROM_NAME="${Youness}"
Pour essayer cette fonctionnalitée, il vous suffit de se connecter dans le site mailtrap.io , ensuite vous générez un username et un password hashcode comme ceci : 

    MAIL_USERNAME=616932d6089574 ( pensez à le remplacer par votre nouveau numéro)
    MAIL_PASSWORD=b51bc9933be688  ( pensez à le remplacer par votre nouveau numéro)
Puis tester pour envoyer un message via le formulaire contact.
### Commentaires 
Pour bien Styler les commentaires, on a utilisé le site Gravatar, une image qui vous suit d'un site à l'autre et qui apparaît à côté de votre nom quand vous postez un commentaire ou un article sur un blog.

Pour utiliser cette option, il suffit de créer un compte dans https://fr.gravatar.com/ ,  et génerer un HashCode et l’inclure dans le html  comme ceci : 

    <img src="{{"https://www.gravatar.com/avatar/" . md5(strtolower(trim($comment->email))) . "?s=50&d=mm" }}" class="auteur-image">

### WYSIWYG
C’est un éditeur de texte utilisé au moment de la création des articles, il permet facilement de customiser, changer la taille, la couleur du texte ainsi que l’insertion des images etc.... Pour l’utiliser on a généré une API via le site Tinymce.com, voici un exemple du script : 

     <script src="https://cdn.tiny.cloud/1/no-api-    key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>

### Images Upload 
La fonctionnalité « images » permet d’ajouter au moment de la création d’un article, une image en utilisant le StorageFile façade. Les différentes images ajoutées sont stockées dans le dossier storages/images.

### Rôle utilisateurs 
Pour le faire, nous avons créé un CRUD User ainsi que deux seeders : Roles-Table-Seeder et     User-Table-Seeder avec la commande : php artisan make :seed ... afin de fixer les rôles     utilisateurs : 3 rôles sont définies : admin, author, user
Pour contrôler l’accès à certaines fonctionnalités, on a utilisé Gates façade dans auth-    service-provider, ici nous avons défini les rôles des utilisateurs. Par exemple : 
Le rôle admin, il permettra de gérer toutes les fonctionnalités du blog, mais aussi l’ajout et la suppression des articles, commentaires, tags, catégories etc… 
Ainsi l’admin pourra gérer les utilisateurs, supprimer et assigner des nouveaux rôles à ceux-ci.
Le Rôle author quant à lui permet simplement d’éditer, de créer les commentaires, les articles, les tags, les catégories sans avoir la main dessus pour les supprimer. 
Enfin, le rôle user établit par défaut à toutes personnes au moment de la registration. Ce rôle permettra de consulter le blog et de mettre des commentaires et même de créer des articles. des règles de restriction ont été établie pour restreindre l’user à accéder à d’autres fonctionnalités comme la modification et la suppression.  Afin de s’assurer que chaque nouvel utilisateur aura le rôle User, on a simplement modifié le code de la fonction create dans Auth/RegisterController.
Pour protéger certaines fonctionnalités à accéder des middleware ont été ajoutés dans routes/web, sauf l’admin et author peuvent accéder à ces routes : -    >middleware('can:manage-users');
Voici 3 utilisateurs afin de tester les différents rôles cités au dessus :

         'name'=>'Admin User',
            'email'=>'admin@admin.com',
            'password'=> adminadmin

        'name'=>'Author User',
            'email'=>'author@author.com',
            'password'=> authorauthor
    
        'name'=>'Generic User',
            'email'=>'user@user.com',
            'password'=> useruser 

### Comptes github

Ci-dessous se trouve les comptes github des membres du groupe ainsi qu’une vue d'ensemble des contributions.

    BOUSSABA Juba : https://github.com/jubsjob
    MADHOUN Younes : https://github.com/madhouny
    MEYER Sylvain : https://github.com/paradigmSOCIAL
    Vue d’ensemble des contributions : https://github.com/madhouny/Vblog/graphs/contributors