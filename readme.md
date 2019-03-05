## Converge Payment Demo

This demo is made with [wwwroth](https://github.com/wwwroth/php-converge-api) plugin

## Converge

Converge is a Payment method powerd by [Elavon](https://developer.elavon.com)

## Laravel

This demo is made of Laravel, Laravel is accessible, powerful, and provides tools required for large, robust applications.

## Credentials

Replace your Converge SSH API credentials in .env file under "ELAVON" section.

## Requirement

Make sure you have installed PHP-CURL depending upon your php version.
 
```sh
php-curl
```

## Installation

Run these commands step by step and enjoy the demo.

```sh
cd converge-demo
composer install
cp .env.example .env
php artisan key:generate
php artisan serve
```
