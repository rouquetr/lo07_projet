#Installation

##Monter le projet SelectivelyBackend en local


- récupérer le dépôt git :

`git clone https://github.com/SelectivelyTeam/SelectivelyBackend.git`

- installer un LAMP (ou équivalent)
- installer mySQL Workbench
- Importer les données de la base dans mySQL Workbench ( Server > Data Import )
- installer composer : https://getcomposer.org/download/
- changer la taille mémoire limite de php dans le php.ini :


`; Maximum amount of memory a script may consume (128MB)`

`; http://php.net/memory-limit`

`memory_limit = 2G`

- Configurer le fichier SelectivelyBackend/app/config/parameters.yml avec ses paramètres personnels :


`database_host: 127.0.0.1`

`database_port: [Port_Base]`

`database_name: [Nom_Base]`

`database_user: [Identifiant]`

`database_password: [MotDePasse]`

- exécuter les commandes suivantes pour installer les packages et déployer les assets (fichiers statiques), se placer dans le dossier SelectivelyBackend :


`composer install`

`php app/console asset:install`

`php app/console assetic:dump`
