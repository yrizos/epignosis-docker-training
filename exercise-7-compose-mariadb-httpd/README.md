# Adding Apache to the mix

In this exercise, we add Apache to our `docker-compose` setup: 

````yaml
version: '3.2'

networks:
  backend:

services:
  php-fpm:
    build: ./php-fpm-pdo
    depends_on:
      - webserver
      - database
    volumes:
      - ./app:/var/www/html
    networks:
      - backend

  webserver:
    build: ./httpd
    volumes:
      - ./app:/var/www/html
    networks:
      - backend
    ports:
      - 8000:80

  database:
    image: mariadb:latest
    networks:
      - backend
    environment:
      MYSQL_ROOT_PASSWORD: 1234
````

A significant difference with our previous setup is that we must tell Apache to bind it's port 80 to a port on the host - 8000 in this case.

To start the setup, we run: 

    $ docker-compose up

Once everything is build and running, we can point our browser to [http://localhost:8000](http://localhost:8000).
