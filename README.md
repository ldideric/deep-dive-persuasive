# Persuasive

## Introduction

Persuasive is a web application that allows lab scientists to upload their test results to a database, which can then be accessed by the GP's.
This way the GP's can see the results of their patients without having to look through all the test results 

The lab scientists can also upload an excel file with all the test results, which will be automatically inserted in the database.
The GP's can search for a patient in the database, and see the risk score of the patient.
The risk score is calculated by an algorithm, which is based on the test results of the patient.

***

## Dependencies

[![Latest Version on Packagist](https://img.shields.io/badge/laravel-v9.x-red)](https://www.laravel.com)
[![Latest Version on Packagist](https://img.shields.io/badge/vuejs-v3.x-brightgreen)](https://www.vuejs.org)
[![Latest Version on Packagist](https://img.shields.io/badge/inertiajs-v1.x-purple)](https://www.inertiajs.com)

For this application we have decided to use the PHP framework Laravel PHP in combination with Javascript framework VueJS by using the InertiaJS package.

InertiaJS is a package that combines the power of Laravel with the simplicity of VueJS.
It allows you to build your entire frontend using VueJS components, 
while still using Laravel's powerful routing and backend features.

***

## Installation

Please check the official laravel installation guide for server requirements before you start. [Official Documentation](https://laravel.com/docs/9.x/installation)

Clone the repository

    git clone git@bitlab.bit-academy.nl:deep-dive2/persuasive.git

Switch to the repo folder

    cd persuasive/application

Install all the dependencies using composer

    composer install

Set up npm dependencies

    npm i

Copy the example env file and make the required configuration changes in the .env file

    cp .env.example .env

Generate a new application key

    php artisan key:generate

Run the database migrations (**Set the database connection in .env before migrating**)

    php artisan migrate:fresh --seed

Start the local development server

    php artisan serve

Start npm run (**In different terminal, both artisan serve and run dev need to stay alive**)

    npm run dev

You can now access the server at http://localhost:8000

### *TL;DR command list*

    git clone git@bitlab.bit-academy.nl:deep-dive2/persuasive.git
    cd persuasive/application
    composer install
    npm i
    cp .env.example .env
    php artisan key:generate
    
Make sure you set the correct database connection information before running the migrations

    php artisan migrate:fresh --seed
    php artisan serve

Also run npm in *different* terminal (keep alive)

    npm run dev

***

## Made by

Three students of the Bit Academy in Amsterdam, who are participating in the Deep Dive.

[![portfolio](https://img.shields.io/badge/Thijs_Meijer-20b8f0?style=for-the-badge&logo=github&logoColor=white)](https://github.com/thijsmeijer)

[![portfolio](https://img.shields.io/badge/Lietze_Diderich-00C04B?style=for-the-badge&logo=github&logoColor=white)](https://github.com/ldideric/)

[![portfolio](https://img.shields.io/badge/Kian_Acquoy-A020F0?style=for-the-badge&logo=github&logoColor=white)](https://github.com/kianacquoy/)