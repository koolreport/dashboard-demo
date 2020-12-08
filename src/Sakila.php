<?php

namespace demo;

use \koolreport\dashboard\sources\MySQL;

class Sakila extends MySQL
{
    protected function connection()
    {
        return [
            "connectionString"=>"mysql:host=sampledb.koolreport.com;dbname=sakila",
            "username"=>"expusr",
            "password"=>"koolreport sampledb",
            "charset"=>"utf8"
        ];
    }
}