## Installation

- Open your terminal and go to any place you want to place project.
- Clone project and enter to it.
    ```
    git clone https://github.com/Saeed-Ayman/management_system
    cd management_system
    ```
- Install laravel project with composer
    ```
    composer install
    ```
- Copy `.env.example` and rename it to `.env`
- Generate laravel app key  
    ```
    php artisan key:generate
    ```
- Generate JWT secret key
    ```
    php artisan jwt:secret
    ```
- Run migration to migrate db <br />
    ```
    php artisan migrate --seed
    ```
    - `Don't forget edit db settings in .env [default sqlite].`
    - `note: --seed is optional to make fake data.`
- Run your server by php
    ```
    php artisan serve
    ```
To help you understand project, i made [postman doc](https://documenter.getpostman.com/view/37623771/2sAY545JAt).
