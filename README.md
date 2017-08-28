# Dockerized LAMP Stack

This is a modern and customisable LAMP stack replacement based on docker and docker-compose.
It supports an unlimited number of projects with vhosts.
PHP xDebug is also included and easy to setup.

This has been tested only on Docker for Mac

## Prerequisites

Docker

https://docs.docker.com/engine/installation/

## Usage

#### 1. Clone the repo

Navigate into your workspace directory and run:

```sh
 git clone git@github.com:SvetoslavKuzmanov/docker-lamp.git
```

#### 2. Start all containers

Navigate to the cloned repo’s directory and run:

```sh
docker-compose up -d
```

This will build, create and start, the containers in the background and leave them running.

Open your browser of preference and navigate to [http://localhost](http://localhost), create your project in the `htdocs` folder and start coding!
If you do not need to run any command line tools manually like composer, it is sufficient to stay on the host. All you need is a browser and an editor or IDE.

### 3. Adding Virtual Hosts

Open the `httpd-vhosts` file in the apache folder and add your vhosts configuration there.
In the `docker-compose.override.yml` under the apache service section edit the `extra_hosts` array to include the vhost that you just added.
Add the vhost to the `/etc/hosts` file on your machine.
Restart all containers:

```sh
docker-compose up -d --build
```

### 4. Setting up xdebug

PHP Xdebug is installed and enabled by default. It is a matter of setting your host machine so it will be able to use it.
To do so you would have alias your local ip address to `10.254.254.254`, so Xdebug can constantly refer to it, regardless of your ip settings.
On Mac OS run:

```sh
ifconfig lo0 alias 10.254.254.254
```

To make this alias on the loopback interface persistent:

1. Create the following plist file in `/Library/LaunchDaemons/com.runlevel1.lo0.10.254.254.254.plist`.
2. Change to mode and the owner of the file:

```sh
sudo chmod 0644 /Library/LaunchDaemons/com.runlevel1.lo0.10.254.254.254.plist
sudo chown root:wheel /Library/LaunchDaemons/com.runlevel1.lo0.10.254.254.254.plist
```

3. Launch:

```sh
launchctl load /Library/LaunchDaemons/com.runlevel1.lo0.10.254.254.254.plist
```

After aliasing your loopback interface configure your favourite editor/IDE to start an Xdebug server on port `9089`!

Happy Coding!
