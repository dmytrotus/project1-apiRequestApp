<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## About project1-apiRequestApp

Project makes API requests to project named project2-database. To get access to the dashboard with users you need to register and login. 

Then you can Create, Read, Delete, Update users data in database from <b>project2</b>.

## ReactJS

Simple example with api-request with React Js you will find in <i>resources/js/components</i>. If you want to see how it works, you need to add div#another_app_container into the blade template.

## Language

Simple example of translations you can find into resources/lang folder. 

## GuzzleHttp

All Http Requests made by Guzzle package

## Jquery

Two simple scripts for managing users you can find into index.blade.php layout 

## How to install

In your terminal run
git clone < link to this repo >
composer install
php artisan key:generate
php artiasan migrate
php artisan db:seed
php artisan serve ( optional php artisan serve --port=1111 for different port for local development )