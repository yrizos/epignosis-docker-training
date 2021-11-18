# Run a process in a container

Docker can run processes in containers. A process is simply a command that is run withing the container. Most images have a default command, for the PHP images that would be PHP itself. 

So, if we for example wish to run `php -v` within the container, we can try: 

    $ docker pull php:7.4
    $ docker run php:7.4 -v

It's not necessary to pull the image before running a command, if `docker run` does not find the image locally it will call `pull`. Try: 

    $ docker run php:8.0 -v

Of course, we can run commands other than the default as well:

    $ docker run php:8.0 echo "hello"
