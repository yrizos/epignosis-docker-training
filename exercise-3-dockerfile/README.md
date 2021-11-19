# Run our app within a container

We can add our own code in a container, and run it. One way to do it is to build our own image.

## Code

For this exercise, our code is a simple PHP script:

    <?php
    
    echo 'Hello world!' . PHP_EOL;

## Image

We define a docker image in a [Dockerfile](https://docs.docker.com/engine/reference/builder/): 

````dockerfile
FROM php:8.0

WORKDIR /app

COPY hello.php /app/

CMD ["php", "hello.php"]
````

In this example we: 

- Base our image on `php:8.0`
- We declare `/app` to be the default working dir
- We copy our script in the working dir
- And finally we change the default command to `php hello.php`

We may build our image with: 

    $ docker build .

The four steps you will see in the output are called layers, correspond to the four commands we have in our Dockerfile and are cached. Only layers we change are going to be build if we call `docker build` again.

If we list our images with `docker images`, we'll see something like: 

    REPOSITORY       TAG       IMAGE ID       CREATED              SIZE
    <none>           <none>    5a8af8f2959e   About a minute ago   476MB
    php              7.4       8e8e75f388d4   6 hours ago          473MB
    php              8.0       5e4594d5b5b4   27 hours ago         476MB

The image we've just build is the first one, the one lacking a name and tag. We can use the image id to reference it, but that's not really convenient. Let's add a name and a tag:

    $ docker build . --tag exercise3:1.0
    $ docker build . -t exercise3:1.0

Now that our container has a name, we can finally run our script:

    $ docker run exercise3:1.0 

Which is equivalent to: 

    $ docker run exercise3:1.0 php /app/hello.php
