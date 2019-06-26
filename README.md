# adminpanel-laravel


## Additional Features
* Built-in Laravel Boilerplate Module Generator,
* Dynamic Menu/Sidebar Builder
* Pages Module
* Blog Module
* FAQ Module
* API Boilerplate
* Mailables
* Responses
* Vue Components
* Laravel Mix
* Object based javascript Implementation


## Built-in Laravel Boilerplate Module Generator
It gives you the ability to create a module using a sweet GUI, where you put in the Module Name and it will generate all the necessary files for you, like Model, Traits, Relationship, Migration, Controllers, Views and routes. So when you are done creating a module, you can directly go to the route generated and see your new module. Since, this does not have the ability to generate table fields for now, so you have to write the migration file that is generated and run a manual php artisan migrate command, and you are good to go.

We are using the module generator as a package, you can find it here: [Module Generator For Laravel Adminpanel](https://github.com/bvipul/generator).

## Installation

Please check the official laravel installation guide for server requirements before you start. [Official Documentation](https://laravel.com/docs/5.6/installation#installation)


Switch to the repo folder

    cd adminpanel-aravel

If you have linux system, you can execute the command below only in your project root

    1) sudo chmod -R 777 install.sh
    2) ./install.sh

If you have windows system, you can run Artisan Command for database setup, connection and configuration.

    php artisan install:app

Generate a new application key

    php artisan key:generate


Run the database migrations (**Set the database connection in .env before migrating**)

    php artisan migrate

Run the database seeders

    php artisan db:seed


Start the local development server

    php artisan serve



You can now access the server at http://localhost:8000
or loacalhost/adminpanel-laravel

**Command list**

    cd adminpanel-laravel
    cp .env.example .env
    composer install
    php artisan key:generate
    php artisan vendor:publish 
    php artisan migrate
    php artisan migrate --seed

## Please note

- To run test cases, add SQLite support to your php

## Other Important Commands
- To fix php coding standard issues run - composer format
- To perform various self diagnosis tests on your Laravel application. run - php artisan self-diagnosis
- To clear all cache run - composer clear-all
- To built Cache run - composer cache-all
- To clear and built cache run - composer cc

## Logging In


* Administrator: `admin@admin.com`
* Password User: `password

## ScreenShots

## Dashboard
![Screenshot](screenshots/dashboard.png)


## Issues

If you come across any issues please report them [here](https://github.com/viralsolani/laravel-adminpanel/issues).



## License

