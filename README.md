# TrustedShops Tasks
Setup: `docker-compose up -d`

## Task 1: Calling an API with JavaScript
Source Code: [./public_html/review-table-js](./public_html/review-table-js)

Solution: [http://localhost:9980/review-table-js/](http://localhost:9980/review-table-js/)

## Task 2: Calling an API with PHP
Source Code: [./public_html/review-table-php](./public_html/review-table-php)

Solution: [http://localhost:9980/review-table-php/](http://localhost:9980/review-table-php/)

## Task 3: Transferring Tasks 1 and 2 to an Angular application
Resolve dependencies: `docker exec -w /root/review-table-angular -it tsas-tools yarn install`

Build angular app: `docker exec -w /root/review-table-angular -it tsas-tools yarn run build`

Source Code: [./workspace/review-table-angular](./workspace/review-table-angular)

Solution: [http://localhost:9980/review-table-angular/](http://localhost:9980/review-table-angular/)

## Task 4: Writing SQL Queries
Connect to mysql shell: `docker exec -it tsas-tools mysql -uroot -pTru5t€d -htsas-db`
```SQL
  use company;

  select * from Buyer
    order by creationDate desc
    limit 10;

  select e.email from (
    select b.id from Buyer b
      left join BuyerEmail e
        on b.id = e.buyer_id
      group by b.id, b.creationDate
        having count(e.email) > 1
      order by b.creationDate
      limit 10
  ) as buyersWithMoreThanOneEmail
  left join BuyerEmail e
    on buyersWithMoreThanOneEmail.id = e.buyer_id;

  select distinct b.* from BuyerShopReview r
  left join Buyer b
    on b.id = r.buyer_id
    limit 20;
```

## Special Task, Optional: Rebuilding Shop Profiles in Angular
Skiped this task.

## Special Task, Optional: Parse Pages with PHP for specific information
### Preparation: SSL Workaround
SSL Hash Algorithmus of TrustedShops is not accepted:
```
Warning: file_get_contents(): SSL operation failed with code 1. OpenSSL Error messages: error:1414D172:SSL routines:tls12_check_peer_sigalg:wrong signature type in /var/www/html/functions/extract_rating_metadata.php on line 3
```

1. Rollback SECLEVEL to 1: `docker exec -it docker-aspirant_tsas-php_1 sed -i "s/CipherString = DEFAULT@SECLEVEL=2/CipherString = DEFAULT@SECLEVEL=1/g" /etc/ssl/openssl.cnf`
2. Restart Container: `docker restart docker-aspirant_tsas-php_1`
### Task Solution
Source Code: [./public_html/crawler](./public_html/crawler)

Solution: [http://localhost:9980/crawler/](http://localhost:9980/crawler/)

-------------------------

# docker-aspirant

Welcome to the application process for Trusted Shops Developer enrollees! This project contains a docker-compose environment,
within you can do all tasks that you are commissioned with.

## Getting started

1. First, install docker (and docker-compose, on linux environments)
  - https://docs.docker.com/glossary/?term=installation
2. Clone this repository where-ever you like to.
3. Open a terminal and run `docker-compose up -d`
4. You should now have a working environment, and can start working.

To use tools and more, we provided you with some stuff here:

``` docker exec -it tsas-tools bash```

This connects you to the shell of a docker-container, ready to use with NodeJS, Angular, MySQL CLI and many more.
You can also use tools you like, for sure.

## Nice to know:
### Commands

**Note:** The commands are only available inside the workspace directory, and relative to root:

- Angular CLI: `docker exec -it tsas-tools ng`, and desired arguments,

  e.g. `docker exec -it tsas-tools ng new`
- NodeJs:
   `docker exec -it tsas-tools node` and desired arguments.,

  e.g. `docker exec -it tsas-tools node hello-world.js`

- Grunt: `docker exec -it tsas-tools grunt` and desired arguments

  e.g. `docker exec -it tsas-tools grunt default`

- MySQL Client
  `docker exec -it tsas-tools mysql` and desired arguments

  e.g. `docker exec -it tsas-tools mysql -uroot -pTru5t€d -htsas-db`

### Locations:

- **./public_html** - This directory is served by nginx. You can reach it through the nginx's address stated below.
  -  Save static files here (HTML, CSS, Images, other assets)
  -  Save PHP files here.
- **./workspace** - Maps to the /root/ home directory of all possible containers, except database and php.
  - Save everything private here.
  - You can write node.js apps here, and run it with `docker exec -it tsas-tools node [MYFILE]`
  - You can create angular-apps in here (**change mytask to whatever name you like**):
      - Setup the project
        ```
        # Create
        docker exec -it tsas-tools ng new --name mytask --routing --style scss --skip-tests --skip-git

        # Configure output for NGINX
        docker exec -w /root/mytask -it tsas-tools ng config "projects.mytask.architect.build.options.outputPath" "/var/www/html/mytask"
        docker exec -w /root/mytask -it tsas-tools ng config "projects.mytask.architect.build.options.baseHref" "/mytask/"
        docker exec -w /root/mytask -it tsas-tools ng config "projects.mytask.architect.build.options.deployUrl" "/mytask/"

        # Start build and watch source code
        docker exec -w /root/mytask -it tsas-tools yarn run build --watch
        ```
      - http://localhost:9980/mytask
- **./wordpress** - When booting the environment, this directory contains all wordpress stuff.
  - Use it for wordpress development.

Digging deeper:
- **./.docker** - nothing relevant for you, just keeps you served with tools.
- **./.docker/nginx** - nginx configuration
- **./.docker/databases** - Basic database dumps, used during first creation of your docker container.

### Ports and Access to the containers:
#### Database
- Port: 9307
- User: root
- Password: Tru5t€d

  Connect with: `docker exec -it tsas-tools mysql -uroot -pTru5t€d -htsas-db`
#### HTTP:
- public_html address: http://localhost:9980
- wordpress address: http://localhost:9980/wordpress
