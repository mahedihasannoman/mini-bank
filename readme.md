## Minibank

The MiniBank online system (MBS) is a small bank for personal and small business. The banking
system enables customer to access their bank account and perform their everyday banking needs.
MBS has many customers, and each customer has one or more accounts. The MBS use the Euro as
currency. The smallest unit of the currency is the single Euro.
When customer open an account, they provide an information pack which contain unique email id and password information for login into the banking system. After that, Customers
can view their account information, perform banking operations online, such as displaying the
balance of an account or transferring money. The customers can also interact with the MBS to
perform common transactions such as performing withdrawals, deposit and transferring money.

## Installation Instruction.

1. Clone the repo.
2. In terminal run `composer update` to download all the libraries and dependencies.
3. Rename .env.example to .env and add your database credentials.
4. Run `php artisan migrate`
5. Run `php artisan key:generate`
6. run the server by `php artisan:serve` then go to your browser `http://localhost:8000/register` to create an account.
7. Then hit `http://localhost:8000/login` to login.
8. Done ! You've entered the admin area. Now play with the features :)