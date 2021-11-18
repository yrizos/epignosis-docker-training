# Utilizing Docker Compose

Working with multiple containers can get messy. Here's where [`docker-compose`](https://docs.docker.com/compose/) comes
in:

> Compose is a tool for defining and running multi-container Docker applications. With Compose, you use a YAML file to configure your application’s services. Then, with a single command, you create and start all the services from your configuration

Here's our simple `docker-compose.yml` that achieves the same result as in the previous exercise:

````yaml
version: '3.2'

networks:
  backend:

services:
  php-fpm-pdo:
    build: .
    depends_on:
      - database
    volumes:
      - ./app:/app
    networks:
      - backend

  database:
    image: 'mariadb:latest'
    networks:
      - backend
    environment:
      MYSQL_ROOT_PASSWORD: 1234
````

To build our setup, we run: 

    $ docker-compose build 

And to run our script, we run: 
    
    $ docker-compose run php-pdo php /app/hello.php
