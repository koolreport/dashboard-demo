<?php

namespace demo;

use \koolreport\dashboard\sources\MySQL;

class AutoMaker extends MySQL
{
    protected function connection()
    {
        return [
            "connectionString"=>"mysql:host=localhost;dbname=automaker",
            "username"=>"root",
            "password"=>"",
            "charset"=>"utf8"
        ];

        // return [
        //     "connectionString"=>"mysql:host=sampledb.koolreport.com;dbname=automaker",
        //     "username"=>"expusr",
        //     "password"=>"koolreport sampledb",
        //     "charset"=>"utf8"
        // ];
    }
}