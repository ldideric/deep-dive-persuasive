# Plan of approach

The following document describes the plan of approach for the project.
Made by:
- Kian Acquoij ([Github](https://github.com/KianAcquoy))
- Lietze Diderich ([Github](https://github.com/ldideric))
- Thijs Meijer ([Github](https://github.com/thijsmeijer))

On behalf of [Persuasive](https://nlc.health/venture/persuasive/).

Made at the [Bit Academy](https://www.bit-academy.nl/) in Amsterdam.

## **Index**
***

* [Introduction](#introduction)
* [Goal](#goal)
* [Target Audience](#target-audience)
* [User Stories](#user-stories)
* [Planning](#planning)
* [Wireframe](#wireframe)
* [Technical specifications](#technical-specifications)
* [Database design](#database-design)

## **Introduction**
***

We have been asked to build a site or app for the company Persuasive.
This is a young startup that wants to create a cheaper bridge between the laboratories and the general practitioner. The connection between these two is very expensive at the moment, and the solution Persuasive proposes will decrease the costs significantly.

The idea for this site to create a platform where laboratories can safely fill in data from lab results and send them to the GP. The GP can then view the results and make a decision on the next steps. This all has to be done in a secure way, so that the privacy of the patient is guaranteed.

To ensure this, the end product has the following requirements:
- Comply with the GDPR.
- Comply with ISO 62304.
- Comply with vitro diagnostics medical device regulations, class B.

We will also make sure the design is user friendly for both the GP and the lab worker. We will also create a Progressive Web App, so that the site can downloaded on the desktops of the GP's and lab workers, making it easier to use.

## **Goal**
***

The goal is to make a site that can bridge the gap between the lab and the GP, saving time and money. This site will be used by both the GP and the lab worker.

The site will have to be very user friendly, because the GP's and lab workers are not very tech savvy.
The site will also have to be very secure, because the privacy of the patients is very important.

## **Target Audience**
***

This site will only be used in the medical field, specifically:
- General Practitioners
- Lab workers

## **User Stories**
***

| ID | As a (role) | In order to (achieve) | I want to (be able to) |
| --- | --- | --- | --- |
| **1** | GP | Spend less time figuring out my patient's test result | See my patient's result without having to look through all test results |
| **2** | GP | Not spend time calculating a patient's risk score | Have an algoritm to do it for me |
| **3** | GP | Not have to manually search for a patient in the database | Have a patient search function |
| **4** | GP | Ensure my patient's privacy | Login with 2 factor authentication |
| **5** | Lab worker | Easily assign a test results to a patient | Assign results to a user by entering data in a form |
| **6** | Lab worker | Quickly insert test results | Upload an excel file |
| **7** | Lab worker | Save time by not having to send the results to the GP | Upload the results to the site |

## **Planning**
***

| Feature | Related user stories | Responsibilities | Finished on | Link to issue |
| --- | --- | --- | --- | --- |
| Insert data in database through form | 5 | Lietze | Day 2 | No issue yet |
| Basic patient search | 3 | Thijs | Day 2 | No issue yet |
| Basic result page | 1 | Kian | Day 2 | No issue yet |
| Login with 2 factor authentication | 4 | Thijs | Day 3 | No issue yet |
| Dummy algorithm | 2 | Kian | Day 3 | No issue yet |
| Read excel file and insert data in database | 6 | Lietze | Day 4 | No issue yet |



## **Wireframe**
***


## **Technical specifications**
***

For this application we have decided to use the PHP framework Laravel PHP in combination with Javascript framework VueJS by using the InertiaJS package.

InertiaJS is a package that combines the power of Laravel with the simplicity of VueJS.
It allows you to build your entire frontend using VueJS components, 
while still using Laravel's powerful routing and backend features.

[![Latest Version on Packagist](https://img.shields.io/badge/laravel-v9.x-red)](https://www.laravel.com)
[![Latest Version on Packagist](https://img.shields.io/badge/vuejs-v3.x-brightgreen)](https://www.vuejs.org)
[![Latest Version on Packagist](https://img.shields.io/badge/inertiajs-v1.x-purple)](https://www.inertiajs.com)

## **Database design**
***

The data structure of the application is shown in the ERD below.

![ERD](images/erd.png)

Persuasive has two types of users, scientists and GPs.

While Scientists can add new research belonging to a patient,
GPs can add new patients and view data belonging to a patient.
