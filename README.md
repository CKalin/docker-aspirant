# docker-aspirant

Welcome to the application process for Trusted Shops Developer enrollees! This project contains a docker-compose environment, 
within you can do all tasks that you are commissioned with.

## Getting started

1. First, install docker (and docker-compose, on linux environments)
2. Clone this repository where-ever you like to.
3. Open a terminal and run `docker-compose up -d`
4. You should now have a working environment, and can start working.

To use tools and more, we provided you with some stuff here:

``` docker exec -it tsas-tools bash```

This connects you to the shell of a docker-container, ready to use with NodeJS, Angular, PHP CLI, MySQL CLI and many more. 
You can also use tools you like, for sure.

## Nice to know:

### Locations:

- ./public_html => this directory is served by nginx. You can reach it through the nginx's address stated below.
- ./workspace => Maps to the root directory of all possible containers, except database and php.
- ./tsas-tools => nothing relevant for you, just keeps you served with tools.
- ./wordpress => when booting the environment, this directory contains all wordpress stuff.
- ./nginx => nginx configuration
- ./databases => Basic database dumps, used during first creation of your docker container.

### Ports and Access to the containers:
####
- Port: 9306
- User: root
- Password: Tru5t€d

#### HTTP:
- public_html address: http://localhost:9980
- wordpress address: http://localhost:9980/wordpress

