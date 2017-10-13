# Using in Production

## Using on Amazon Linux
If you are using EC2 or Lightsail with the Amazon Linux OS:

1. Install git and Docker:
	```
	sudo yum update -y
	sudo yum install -y docker
	sudo service docker start
	sudo usermod -a -G docker ec2-user
	```
1. Log out and log back in to pick up the group added above
1. Follow the [instructions](https://docs.docker.com/compose/install/#install-compose) to install `docker-compose`
1. Follow the installation instructions above.

## Setup
1. Before following the installation instructions in the [README](README.md), set the port nginx listens on by setting the `PORT` environment variable:
	```
	export PORT=80
	```
2. Follow the standard Setup instructions in the [README](README.md).

## Running `docker-compose`
Pass `prod` to the `up` bin script provided:
```
./bin/up prod
```

# TODO
* Init script
