A simple form to send information to email. 
Check out the demo [here](https://simple-form-email.qhaixan.com/)

# Setup
## Prerequisite
- PHP 8.1.7
- [Composer](https://getcomposer.org/)
- [Node.js](https://nodejs.org/en/)

Enter the commands:
```sh
composer install
cp .env.example
php artisan key:generate
npm install
npm run build
```
and finally
```sh
php artisan serve
```

Remember to change the mail credentials in **.git** to make the mailer work.
