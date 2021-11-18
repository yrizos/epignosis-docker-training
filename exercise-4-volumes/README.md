# Run our app using volumes

Another way to run our code within a container is to [use volumes](https://docs.docker.com/storage/volumes/):

    $ docker run --volume $(pwd):/app php:8.0 php /app/hello.php
    $ docker run -v $(pwd):/app php:8.0 php /app/hello.php

Here, we:

- We build a `php:8.0` based container
- We mount our current working directory (which contains our script) to the container's `/app`
- We execute `php /app/hello.php`

The most significant difference with copying our code within the container is that we don't need to rebuild the container to see changes in our script.

Try changing the script and repeating the `docker run` command. 
