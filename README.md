<h1>Fullhouse project</h1>
Fullhouse is a web app which helps people find an apartment to rent. 

- There is 3 role for users: admin, member,guest

- Admin create posts which include information about apartments: owner, location, description, image,...Guest can access to website, search apartments by title, or choose filter options and view apartment detail. But they have to register account  to use other features of website: pay deposit, make an appointment with owner of apartment.

## Environment
- Laravel 8
- PHP 7.4
- MySQL 8.0.32
- Apache 2

## Packages:
- DataTables v1.10.24
- JSZip v3.6.0
- pdfmake v0.1.70
- stripe

## Installation
- Pull source code from repo
- Make .env file from .env.example then fill database information which same as the information in file docker-compose.yml:
- Database configuration
```
DB_CONNECTION=mysql
DB_HOST=mysql-db
DB_PORT=3306
DB_DATABASE=laravel
DB_USERNAME=root
DB_PASSWORD=123456
```
- Mail service configuration to send email. You can get your app password, access https://myaccount.google.com/security. The go to section "Signing to Google", choose "App passwords" to make your app password.
```
MAIL_MAILER=smtp
MAIL_HOST=smtp.gmail.com
MAIL_PORT=587
MAIL_USERNAME=your-email@gmail.com
MAIL_PASSWORD=your-app-password
MAIL_ENCRYPTION=tls
MAIL_FROM_ADDRESS="your-email@gmail.com"
MAIL_FROM_NAME="${APP_NAME}"
```
- Sripe configure to use online payment
```
STRIPE_KEY=your-stripe-key
STRIPE_SECRET=your-stripe-secret-key
```
- Run commands below:
```
docker-compose up -d --buld
docker exec -it laravel-app bash
composer install
php artisan migrate
```
Now, we can access https://localhost:8000 to use Fullhouse.
