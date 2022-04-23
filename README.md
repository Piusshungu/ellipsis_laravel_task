

<p align="center">
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/badge/label-Laravel-blue" alt="Laravel"></a>
</p>


# Ellipsis `LINK SHORTEN` APP

This is a simple application (web application) aiming at shortening the URL provided by the user before redirecting to another page. In addition to that, admin user will be able to view, edit and delete the URLs provided

# Setup
## First clone the project to your local environmennt
- database

  ```sh
  $ type of database: mysql;
  $ create a database
  
- Copy configuration

  ```sh
  composer install
  $ cp .env.example .env (If you are using most recently version of Laravel no need for this step)
  $ php artisan key:generate (If you are using most recently version of Laravel no need for this step)
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

## Enjoy and have fun 
    
