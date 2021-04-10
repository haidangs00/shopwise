<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## Guide to run the laravel project
//Add file .gitignore for Laravel project

//Run command line
composer install

######################## FOR FIRST TIME ########################################
//Rename file ".env.example" to ".env"
//Inside file .env
//update DB_DATABASE={your database}
//update DB_USERNAME={your username}
//update DB_PASSWORD={your password}

################################# END ###########################################

//Run command line
php artisan key:generate

php artisan migrate --seed

php artisan config:cache
```
## Run app
```bash
php artisan serve --port={your port}

//Check route app
php artisan route:list  //list all route in app
