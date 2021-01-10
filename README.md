# PHP Dashboard Framework

## About

This repository contains sample dashboard application built on top of KoolReport's Dashboard Framework. The application act as demonstration of framework's features as well as examples for you to start with.

## KoolReport's Dashboard

[KoolReport's Dashboard](https://www.koolreport.com/packages/dashboard) is a __PHP Dashboard Framework__ to facilitate dashboard construction. The framework is built on top of [KoolReport Pro](https://www.koolreport.com/get-koolreport-pro) which is general data reporting framework. Dashboard framework is added with following features:

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
11. Work with other frameworks like Laravel, CodeIgniter, Yii2, Symfony

## Demonstration

You may view the result in here

[![](https://www.koolreport.com/assets/images/editor/c5/image5ff5e2c35199e.png)](https://www.koolreport.com/dashboard/demo/)

Link: [https://www.koolreport.com/dashboard/demo/](https://www.koolreport.com/dashboard/demo/)

## Documentation

Full documentation can be found at

[https://www.koolreport.com/docs/dashboard/overview/](https://www.koolreport.com/docs/dashboard/overview/)

## Installation

#### Step1: Clone our dashboard demo

To clone our dashboard demo, please run

```
git clone git@github.com:koolreport/dashboard-demo.git
```

#### Step 2: Add authentication

Please login into our website, navigating the [My Licenses](https://www.koolreport.com/my-licensed-packages) and click to __[Get Token For Composer]__ button.

Near existed `composer.json`, please create `auth.json` and fill it with authentication information from Token For Composer pop up.

#### Step 3: Run composer to update

```
composer update
```

#### Step 4: Install database (Optional)

Please locate the `automaker.sql` inside `data` folder and then import it to your databases.

*Note: We provided a public database connection so you may run example immediately, but if you want to use local database, you take this step and the step 5*

#### Step 5: Provide connection inside `AutoMaker.php` (Optional)

Please locate the `AutoMaker.php` and provide detail connection to your installed AutoMaker.

*Note: If you take the step 4 then you should take this step, otherwise move to step 6*

#### Step 6: Run

You may run the demo now

```
http://localhost/dashboard-demo/
```

### Thank you!

__*<3 koolreport team*__