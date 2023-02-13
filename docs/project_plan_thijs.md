# Project Plan

### Project Information

For this application we have decided to use the PHP framework Laravel PHP in combination with Javascript framework VueJS by using the InertiaJS package.

InertiaJS is a package that combines the power of Laravel with the simplicity of VueJS.
It allows you to build your entire frontend using VueJS components, 
while still using Laravel's powerful routing and backend features.

[![Latest Version on Packagist](https://img.shields.io/badge/laravel-v9.x-red)](https://www.laravel.com)
[![Latest Version on Packagist](https://img.shields.io/badge/vuejs-v3.x-brightgreen)](https://www.vuejs.org)
[![Latest Version on Packagist](https://img.shields.io/badge/inertiajs-v1.x-purple)](https://www.inertiajs.com)

### Data structuur

The data structure of the application is shown in the ERD below.

![ERD](images/erd.png)

Persuasive has two types of users, scientists and GPs.

While Scientists can add new research belonging to a patient,
GPs can add new patients and view data belonging to a patient.

