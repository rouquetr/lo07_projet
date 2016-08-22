# lo07_projet

** Code Mardown ***
*********************

Monter le projet SelectivelyBackend en local
==

récupérer le dépôt git :
-

git clone url_depot
git checkout XXXX TODO

installer un LAMP (ou équivalent)
installer mySQL Workbench
Importer les données de la base dans mySQL Workbench ( Server > Data Import )
installer composer : https://getcomposer.org/download/
changer la taille mémoire limite de php dans le php.ini :

; Maximum amount of memory a script may consume (128MB)
; http://php.net/memory-limit
memory_limit = 2G

Configurer le fichier SelectivelyBackend/app/config/parameters.yml avec ses paramètres personnels :

database_host: 127.0.0.1
database_port: 3306
database_name: selectively_rio
database_user: root
database_password: null

exécuter les commandes suivantes pour installer les packages et déployer les assets (fichiers statiques) :

php app/console
php app/console asset:install
app/console assetic:dump
