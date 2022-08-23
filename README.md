
## About laravel-bootstrap-spatie-authentication-scafolding

Basic Athentication with multiple Roles and Permission in Laravel


## Requirement
Laravel Version 9.x
PHP Version ^8.0


## Installation

Clone your project

```bash
git clone https://gitlab.com/khairat/laravel-bootstrap-spatie-authentication-scafolding.git
```

Go to the folder application using 
```bash
cd application_folder
```

Run
```bash
composer install
```

Copy .env.example file to .env on the root folder. You can type in the command promt:

```bash
cp .env.example .env
```

Open your .env file and change the database name (DB_DATABASE) to whatever you have, username (DB_USERNAME) and password (DB_PASSWORD) field correspond to your configuration.

Run the following Command:

```bash
php artisan key:generate
php artisan migrate
npm install
npm run dev
```

Finally Start your application by running following command:

```bash
php artisan serve
```
This will start your application, visit: http://localhost:8000/

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).

Admin user
email: admin@admin.com
pass: password

Normal User:
email: user@user.com
pass: password