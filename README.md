## Instructions
- Clone this repository. 
- Ensure the docker installed is active on host
- Start docker containers `docker compose up -d --build`. Database and tables will also be created on the startup. 
- Connect to app container to run commands: `docker exec -it wpmedia-app bash`
  - Make sure you are in the `/var/www` path
  - Install php dependencies: `composer install`
  - Run tests: `vendor/bin/phpunit`
- Visit Browser: `http://localhost:8000`

