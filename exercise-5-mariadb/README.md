# Adding MariaDB to the mix

In this example, we'll change our script to query a database. First, let's pull `mariadb:latest`:  

    $ docker pull mariadb:latest

Next, let's build & run the container: 

    $ docker run -e MYSQL_ROOT_PASSWORD=1234 -p 33060:3306 mariadb:latest

Let's see what's going on here: 

- `-e MYSQL_ROOT_PASSWORD=1234`: The maintainers of the image have given us a convenient environment variable to set the root password. 
- `-p 33060:3306`: Here we bind a port on the host machine (3307) to a port on the container
- `mariadb:latest`: MariaDB offers a number of different versions in their [Docker Hub page](https://hub.docker.com/_/mariadb), but here we just grab the latest.

Now that we have a running MariaDB process, we can switch to a different terminal and run our script: 

    $ docker run -v $(pwd):/app php:8.0 php /app/hello.php

This will fail with an error similar to this: 

    Fatal error: Uncaught PDOException: could not find driver in /app/hello.php:7
    Stack trace:
    #0 /app/hello.php(7): PDO->__construct('mysql:host=172....', 'root', '1234')
    #1 {main}
    thrown in /app/hello.php on line 7

Unfortunately, `php:8.0` does not come with PDO installed. We'll have to create our own image to include it: 

````dockerfile
FROM php:8.0 

RUN docker-php-ext-install pdo pdo_mysql
````

We can build our image with: 

    $ docker build -t php-pdo:latest .
    
And then try running our script with: 

    $ docker run -v $(pwd):/app php-pdo:latest php /app/hello.php

## What's MariaDB's host?

To find out MariaDB's host, you'll first need to grab the container's name:

    $ docker ps

Assuming the container is still running, there should be an entry in the list like: 

    e430e6449db5   mariadb:latest                     "docker-entrypoint.s…"   14 minutes ago   Up 14 minutes   0.0.0.0:33060->3306/tcp, :::33060->3306/tcp   dazzling_hoover

If we don't specify a name for our container, Docker generates one for us, in this instance `dazzling_hoover`. We can get a ton of information for the container - including it's IP - by simply running: 

    $ docker inspect dazzling_hoover
    $ docker inspect dazzling_hoover | grep "IPAddress"
