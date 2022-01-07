# Laravel Caricatur Platform

This is a simple caricatur media platform using laravel 7.2.0

## Screenshot
 ![alt text](https://raw.githubusercontent.com/gazi-dis/laravel-caricatur-platform/main/screenshots/ss1.png)

## Getting started

### Launch the project

_(Assuming you've [installed Laravel](https://laravel.com/docs/7.x#installation))_

Fork this repository, then clone your fork, and run this in your newly created directory:

```bash
composer install
```

Next you need to make a copy of the `.env.example` file and rename it to `.env` inside your project root.

Run the following command to generate your app key:

```
php artisan key:generate
```

Run the following command to generate database tables:
```
php artisan migrate
```

Run the following command to create table indexs:
```
php artisan db:seed
```

Run the following command to configure media file system:
```
php artisan storage:link
```

Then start your server:

```
php artisan serve
```

Your Laravel starter project is now up and running!

### First Admin Info
 Mail: admin@mail.com 
 Password: 123456

