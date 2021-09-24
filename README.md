## Installation

Clone the repository from github with a terminal:

```sh
git clone https://github.com/omotolaawokunle/books-api-test.git
```
Run these terminal commands in the project directory:

```sh
composer install
```
```sh
npm install && npm run dev
```
```sh
cp .env.example .env
```

Enter your database credentials [DB_DATABASE,
DB_USERNAME, DB_PASSWORD] in the .env file

Run the migration files:
```sh
php artisan migrate --seed
```
Start up a server for the project
```sh
php artisan serve
```
Open up a web browser and go to http://localhost:port where *port* is the port number the Laravel server generates while running ` php artisan serve`

