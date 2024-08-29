# laravel-vue-recipe-challenge

## Getting started

### Installation

Starting mysql server

Clone the repository

    git clone https://github.com/webgently/laravel-vue-recipe-challenge.git

Switch to the repo folder

    cd laravel-vue-recipe-challenge

Install all the dependencies using composer

    composer install

Install all the style modules

    npm install

Copy the example env file and make the required configuration changes in the .env file

    rename .env.example .env

Generate a new application key

    php artisan key:generate

Install the databases

    php artisan migrate

Start the local development server1

    npm run dev

or

    npm run build
    
Start the local development server2

    php artisan serve

You can now access the server at http://localhost:8000

**TLDR command list**

    git clone https://github.com/webgently/recipe-manage.git
    cd recipe-manage
    composer install
    npm install
    rename .env.example .env
    php artisan key:generate
    php artisan migrate

**start server**

    npm run dev
    or
    npm run build
    php artisan serve

**project reference**

- admin ( admin has role that view, create, edit and delete )
- user ( user has only role that view )

**user role**

- You are going to work with admin role : Please register and login  `mail: admin@gmail.com, name: admin` (only).
- You are going to work with user role : `mail: gently039@gmail.com, name: Passionate` (anyway).
