# Dashboard Framework Demonstration

## About

This repository contains sample dashboard application built on top of KoolReport's Dashboard Framework. The application act as demonstration of framework's features and capabilities as well as examples for you to start with.

## KoolReport's Dashboard

KoolReport's Dashboard is a PHP Dashboard Framework to facilitate dashboard construction. The framework is built on top of KoolReport Pro which is general data reporting framework. Dashboard framework is added following features:

1. Dashboard Admin Templates
2. Authentication & Authorization
3. QueryBuilder data connection
4. Caching
5. Single-page application
6. Multi-language supported
7. Integratable to popular frameworks


## Installation

__Step1:__ Clone our dashboard demo

To clone our dashboard demo, please run

```
git clone git@github.com:koolreport/dashboard-demo.git
```

__Step 2:__ Add authentication

Please login into our website, navigating the [My Licenses](https://www.koolreport.com/my-licensed-packages) and click to [Get Token For Composer] button.

Near existed `composer.json`, please create `auth.json` and fill it with authentication information from Token For Composer pop up.

__Step 3:__ Run composer to update

```
composer update
```

__Step 4:__ Install database

Please locate the `automaker.sql` inside `data` folder and then import it to your databases.

__Step 5:__ Provide connection inside `AutoMaker.php`

Please locate the `AutoMaker.php` and provide detail connection to your installed AutoMaker.

__Step 6:__ Run

You may run the demo now

```
http://localhost/dashboard-demo/
```

## Thank you!

__<3 koolreport team__