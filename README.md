#Installation

##Local installation of the SelectivelyBackend

- Install a LAMP (or equivalent)

- Download the repository in the repertory /www from your LAMP installation :

`git clone https://github.com/SelectivelyTeam/SelectivelyBackend.git`

- Install a database management system like mySQL Workbench or PHPMyAdmin (or equivalent)
- Install Composer : https://getcomposer.org/download/
- Change the memory limit of php in php.ini :


`; Maximum amount of memory a script may consume (128MB)`

`; http://php.net/memory-limit`

`memory_limit = 2G`

- Execute following command to install packages :


`composer install`

- Execute following commands to deploy assets (statics files), allowing to avoid css problems :


`php app/console asset:install`

`php app/console assetic:dump`

- Execute following command to load the data in the database:

`php app/console doctrine:fixtures:load`

- Execute following commands to create a local account and promote it (when it asks you for a role, type `ROLE_SUPER_ADMIN`):

`php app/console fos:user:create`

`php app/console fos:user:promote`
 
- Use the following URL to connect yourself on the local site:

`localhost/SelectivelyBackend/web/app_dev.php/admin`


##Tests

-With postman, import those files into postman:

	-`officemanager_test.json` for the tests, and the requests
	-`officemanager_env_local.json` for the local environment, be sure to check if the environment variable base_url is the same than yours
	-`officemanager_env_stage.json` for the stage environment, nothing to check here

-With newman, be sure to have a NodeJS version > v4, if you haven't NodeJS installed, it can be downloaded from :

`https://nodejs.org/en/download/package-manager/`

-Then, install newman with this command:

`npm install newman --global;`
