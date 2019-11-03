## Minibank

Minibank is a small home accounting solution to track record on various incomes and expenses. You can categorize your accounts and setup various payers and payees. There are eight type of report features are bundled with this app that allows you to monitor your overall statistics in a nice and intuitive way. The app is build with Laravel 4.2 and follows SOLID design principle. UI is done with bootstrap base free admin template. To install this app on your system, do the following thing.

1. Clone the repo.
2. Install composer
3. run `composer install` to install all the libraries and dependencies.
4. Configure database information from app/config/database.php
5. Browse the parent directory from terminal then type and press `php artisan:migrate` to deploy the database tables.
6. run the server by `php artisan:serve` then go to your browser `http://localhost:8000/register` to create an account.
7. Then hit `http://localhost:8000/login` to login.
8. Done ! You've entered the admin area. Now play with the features :)