##Tests

With postman, import those files into postman:

- for the tests, and the requests:
	
`officemanager_test.json`
			
- for the local environment, be sure to check if the environment variable base_url is the same than yours
		
`officemanager_env_local.json`
		
- for the stage environment, nothing to check here
		
`officemanager_env_stage.json`

-With newman, be sure to have a NodeJS version > v4, if you haven't NodeJS installed, it can be downloaded from :

`https://nodejs.org/en/download/package-manager/`

-Then, install newman with this command:

`npm install newman --global;`
