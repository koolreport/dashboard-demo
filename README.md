# Dashboard Framework Demonstration

## About

This repository contains sample dashboard application built on top of KoolReport's Dashboard Framework. The application act as demonstration of framework's features and capabilities as well as examples for you to start with.

## KoolReport's Dashboard

KoolReport's Dashboard is a PHP Dashboard Framework to facilitate dashboard construction. The framework is built on top of KoolReport Pro which is general data reporting framework. Dashboard framework is added following features:

1. Built-in authentication
2. Allow authorization from application to data field
3. Work with MySQL, Postgres, SQL Server, SQLite
4. Support data from CSV, Excel files
5. Support Data Caching at widget level
6. Support multi-languages
7. Support Multi-themes
8. Beautiful single page application
9. Support lazy loading for widgets
10. Flexible three levels organized menus
11. Work with other frameworks like Laravel, Codeigniter, Yii2, Symfony

## Installation

#### Step1: Clone our dashboard demo

To clone our dashboard demo, please run

```
git clone git@github.com:koolreport/dashboard-demo.git
```

#### Step 2: Add authentication

Please login into our website, navigating the [My Licenses](https://www.koolreport.com/my-licensed-packages) and click to [Get Token For Composer] button.

Near existed `composer.json`, please create `auth.json` and fill it with authentication information from Token For Composer pop up.

#### Step 3: Run composer to update

```
composer update
```

#### Step 4: Install database

Please locate the `automaker.sql` inside `data` folder and then import it to your databases.

#### Step 5: Provide connection inside `AutoMaker.php`

Please locate the `AutoMaker.php` and provide detail connection to your installed AutoMaker.

#### Step 6: Run

You may run the demo now

```
http://localhost/dashboard-demo/
```

## Thank you!

__<3 koolreport team__