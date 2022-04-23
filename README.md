

<p align="center">
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/badge/label-Laravel-blue" alt="Laravel"></a>
</p>


# Ellipsis `LINK SHORTEN` APP

Biashara plus is a well crafted and simple to use app that aims to help business owners at Forever to access their products pricelist and removing all the go betweens that slow you down so they can use the extra time to do some more biashara.

# Setup
## First clone the project to your local environmennt
- database

  ```sh
  $ type of database: mysql;
  $ create a database
  
- Copy configuration

  ```sh
  composer install
  $ cp .env.example .env
  $ php artisan key:generate
  ```
- setup the database credentials to the .env file

  ```sh
  $ username: your_username
  $ database: your_created_db_name
  $ password: your_password
  
- Run Migration

  `php artisan migrate `
  
- Install `mailHog` for local email sending
  
  Read `https://medium.com/@viraljetani/laravel-quickly-send-or-test-emails-while-on-localhost-using-mailhog-and-tinker-viral-jetani-c174662c4a71`
    
- Start application
     - clear cache
  ```
     php artisan optimize:clear
  
      php artisan serve
  ```
  
    - Install Node & Npm
 
        `npm install && npm run watch`

## Take A Cup Of Coffee & Good Luck!!
    
