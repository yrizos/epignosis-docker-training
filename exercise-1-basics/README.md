# Pull an image from a registry

A [registry](https://docs.docker.com/registry/) stores and distributes Docker images. [Docker Hub](https://hub.docker.com/), Docker's own registry, is the default registry and it's where we'll be getting our images from in these exercises.

To pull an image, we use `docker pull`:

    $ docker pull php:7.4

This will download the PHP image, tagged 7.4. Tags are _usually_ used to denote the version of the service packed in the image. You may find more PHP images in [PHP's Docker Hub page](https://hub.docker.com/_/php).

## List pulled images

To list all the images you have pulled locally, try: 

    $ docker images

To remove an image, say the one we just pulled, try: 

    $ docker rmi php:7.4
