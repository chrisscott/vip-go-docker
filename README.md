# VIP Go Docker

Get started quickly with VIP Go and Docker. Based off [https://github.com/joshbetz/docker-wp](https://github.com/joshbetz/docker-wp).

This will set up the VIP Go `mu-plugins`, your site's VIP Go repo, and the following Docker containers:

* nginx
* php
* mysql
* memcached
* wpcli

## Prerequisites

* Docker Engine
* Docker Compose
* Docker Machine

These can be installed using your system's native package manager or from binaries/installers. See the [Docker docs](https://docs.docker.com/engine/installation/) for details.

## Setup
If you are running this on a production server, see the [production README](README-production.md) _before_ following the steps below.

1. In the directory you'd like to be the root of your site:
	```
	git clone https://github.com/chrisscott/vip-go-docker.git . && rm -rf .git
	```
	This will add the files from this repo that are used in the following steps.

	**NOTE:** If you want to run nginx on a different port than 8000 set the `PORT` environment variable before continuing. See the [production README](README-production.md) for details.

1. **Make sure Docker is running** then:
	```
	./bin/init
	```
	This will set up the Docker containers and run `docker-compose up -d` to bring them to life.
	Once that completes, go to the link noted (`http://localhost:8000/` for a local installation) to install WordPress. You do not need to log in as you'll do that after the next step.

1. After you have installed WordPress, run:
	```
	./bin/vipinit
	```
	This will prompt you for the Github SSH URL of your VIP Go repo and check that out along with the VIP Go mu-plugins and the memcached object cache plugin.

	Log into WordPress and you should have a nice, shiny VIP Go compatible installation!

## Running

After following the installation instructions above you can use the provided bin script to run the site:
```
./bin/up
```

You can also use the standard `docker-compose` commands:

* `docker-compose up` will _create_ and start all containers in the foreground and output all container output (Ctrl+C to stop the containers). Use the `-d` flag to run in the background.
* `docker-compose start` will start all containers.
* `docker-compose stop` will stop all containers running in the background.
* `docker-compose logs [container]` will show the latest output from `[container]` (see container names above).

### WP-CLI
To run `wp` use `./bin/wp` and pass in any arguments you normally would. e.g. `./bin/wp --allow-root shell`

## Upgrade WordPress

```
docker pull wordpress:php7.1-fpm
docker-compose build
docker-compose stop php && docker-compose rm -v php
docker-compose -f docker-compose.yml -f docker-production.yml up -d
```
