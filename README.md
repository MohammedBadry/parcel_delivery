# Getting started

## Installation

Download and unzip the repository

Switch to the repo folder

    cd parcel_delivery

Install all the dependencies using composer

    composer install

Install nodejs dependencies

    npm install

    npm run dev

Copy the example env file and make the required configuration changes in the .env file

    cp .env.example .env

Set the correct database connection information for your localhost

    DB_DATABASE=

    DB_USERNAME=

    DB_PASSWORD=


Generate a new application key

    php artisan key:generate

Run the database migrations (**Set the database connection in .env before migrating**)

    php artisan migrate


## Database seeding

Run the database seeder and you're done (This will seeds 5 senders and 10 bikers)

    php artisan db:seed

Start the local development server

    php artisan serve

You can now access the server at http://localhost:8000

    php artisan migrate:refresh

The api can be accessed at [http://localhost:8000/api](http://localhost:8000/api).

    Postman colection attached for the api endpoints

# Code overview

## Folders

- `app/Models` - Contains all the Eloquent models
- `app/Actions/Fortify` - Contains all web auth controllers
- `app/Http/Controllers/Sender` - Contains sender controllers for web dashboard
- `app/Http/Controllers/Biker` - Contains biker controllers for web dashboard
- `app/Http/Controllers/Api/Auth` - Contains all API auth controllers
- `app/Http/Controllers/Api/Sender` - Contains sender controllers for API
- `app/Http/Controllers/Api/Biker` - Contains biker controllers for API
- `app/Http/Requests` - Contains Requests validation files
- `app/Http/Resources` - Contains API Json Resouces
- `config` - Contains all the application configuration files
- `database/migrations` - Contains all the database migrations
- `database/seeds` - Contains the database seeder
- `routes` - Contains all the api routes defined in api.php file
