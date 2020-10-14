
# Predictions RESTful API

It is a repository with a RESTful API for storing, listing and updating football matches predictions created with PHP, Laravel and MySQL using Docker environment. For quick local installation follow below instructions.


## Requirements

1.  `Docker` installed
    * [Docker](https://docs.docker.com/install/) is available for free on:
        1. Linux
            * .rpm (RHEL)
            * .deb (Debian, Ubuntu)
            * or you can compile binaries
        2. [Mac](https://docs.docker.com/docker-for-mac/)
        3. [Windows](https://docs.docker.com/docker-for-windows/) 
2.  `Docker Compose` installed
    * [Install Compose Guide](https://docs.docker.com/compose/install/)


# Setup

Please make you sure you have installed `docker` and `docker-compose`. 

## Clone repository

1. Clone this repository
2. Go the project's main directory

## Fill database credentials

Copy `.env` file into `.env.example` and fill database credentials. 

**Notice:** Please do not change `DB_HOST` value, as it comes from the `docker-compose` configuration.

## Build docker images
1. Go the project's main directory
2. Run `docker-compose build` (it may take a few minutes)

## Run docker containers

**Notice:** Before starting containers make sure that listed ports are free on your local machine:

-   80 (and 443 if using SSL for application)
-   3306
1. Go to the main repository folder

2. Run `docker-compose up -d`
    - `-d` option is important if you want to run containers in the background<br/>

3. Install project dependencies:
`docker exec -it APP_CONTAINER_ID php composer.phar install`
    - use `docker ps` command to quickly get app CONTAINER ID<br/>
    
4. Generate application key:
`docker exec -it APP_CONTAINER_ID php artisan key:generate`

5. Run migrations
`docker exec -it APP_CONTAINER_ID php artisan migrate`

Now you can hit an API v1 under http://localhost/api/v1 entry point.

## Stop docker containers
In order to stop docker containers:
1. Go to the main repository folder
2. Run `docker-compose down`

# API Documentation

To get Postman collection simply press:  
  
[![Run in Postman](https://run.pstmn.io/button.svg)](https://app.getpostman.com/run-collection/25e2b45ba478e3f21985)  

or manually import collection using `Import` button in your Postman app and link:  
https://www.getpostman.com/collections/25e2b45ba478e3f21985  



