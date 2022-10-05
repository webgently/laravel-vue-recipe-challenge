# recipe-manage-vue-laravel

## Getting started

### Installation

Starting mysql server

Clone the repository

    git clone https://github.com/webgently/recipe-manage.git

Switch to the repo folder

    cd recipe-manage

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

Start the local development server2

    npm run dev

Start the local development server1

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
    php artisan serve

**project reference**

- admin ( admin has role that view, create, edit and delete )
- user ( user has only role that view )

**user role**

- You are going to work with admin role : Please register and login  `mail: admin@gmail.com, name: admin`(only).
- You are going to work with user role : ex: `mail: liuwentalent0811@gmail.com, name: Liu Wen`(anyway).
