# CounterPoint POS - IT0049 TFA8

CounterPoint POS is the IT0049 TFA8 Laravel activity: a small point-of-sale application with authenticated customer and store-user resource management, validation, and avatar uploads in a metallic theme.

## Laravel version

This project uses Laravel 12.

## Setup

```bash
composer install
copy .env.example .env
php artisan key:generate
```

The application uses the MySQL database configured in `.env`:

```dotenv
DB_CONNECTION=mysql
DB_DATABASE=laravel_tfa8
DB_USERNAME=root
DB_PASSWORD=
```

Run the migrations and seed the sample records:

```bash
php artisan migrate
php artisan db:seed
```

## Run the application

```bash
php artisan serve
```



Then open the local URL shown by Artisan.

## Available routes

- `/` - landing page
- `/about` - project overview
- `/customers` - authenticated customer resource
- `/users` - authenticated store-user resource

Authentication routes remain available to guests at `/login` and `/register`. Customer and user resource routes use Laravel resource controllers and require authentication.
