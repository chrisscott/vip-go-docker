# VIP Go Docker

Get started quickly with VIP Go and Docker.

## Prerequisites

* Docker Engine
* Docker Compose
* Docker Machine

These can be installed using your system's native package manager or from binaries/installers. See the [Docker docs](https://docs.docker.com/engine/installation/) for details.

## Installation
In the directory you'd like to be the root of your site:
```
git archive --format=tar --remote=git@github.com:chrisscott/vip-go-docker.git HEAD | tar xf -
```
This will add the files from this repo that are used in the following steps.

Make sure Docker is running then:
```
./bin/init
```
This will set up the Docker containers and run `docker-compose up` to bring them to life.
Once that completes, go to `http://localhost:8000/` to install WordPress. You do not need to log in as you'll do that after the next step.

After you have installed WordPress, run:
```
./bin/vipinit
```
This will prompt you for the Github SSH URL of your VIP Go repo and check that out along with the VIP Go mu-plugins and the memcached object cache plugin.

Log into WordPress and you should have a nice, shiny VIP Go compatible installation!

## Upgrade WordPress

```
docker pull wordpress:php7.1-fpm
docker-compose build
docker-compose stop php && docker-compose rm -v php
docker-compose -f docker-compose.yml -f docker-production.yml up -d
```
