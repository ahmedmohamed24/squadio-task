# Wishlist - Squadio

## Getting started

1. Fork this Repository

   `git clone https://github.com/ahmedmohamed24/squadio-task wishlist`

1. change the current directory to project path ex:

   `cd wishlist`

1. update MYSQL credentials if needed in _docker-compose.yml_ file

   ```yaml
   environment:
     MYSQL_DATABASE: wishlist
     MYSQL_ROOT_PASSWORD: password
     SERVICE_TAGS: dev
     SERVICE_NAME: mysql
   ```

   _docker will create your database with the provided credentials during installation process_

   ***

1. `docker-compose build && docker-compose up -d`

   **alert:** </span> if there is a server running in your machine, you should stop it or change port 80 in docker-compose.yml to another port(8000)

   ```yaml
   services:
     app:
       build:
         context: .
         dockerfile: nginx.dockerfile
         container_name: nginx
         ports:
           - "8000:80"
   ```

   _you can do this with each service_

1. update the .env database credentials

```
DB_CONNECTION=mysql
DB_HOST=mysql
DB_PORT=3306
DB_DATABASE=wishlist
DB_USERNAME=root
DB_PASSWORD=password
```

1. install composer dependencies `docker exec -it php composer install`

1. Run test cases `docker exec -it php php artisan test`

1. run migrations and seed items `docker-compose exec php php /var/www/html/artisan migrate --seed`
