<?php

namespace demo;

use \koolreport\dashboard\sources\MySQL;

class AdminAutoMaker extends MySQL
{
    protected function connection()
    {
        /**
         * Local database connection sample
         */
        // return [
        //     "connectionString"=>"mysql:host=localhost;dbname=automaker",
        //     "username"=>"root",
        //     "password"=>"",
        //     "charset"=>"utf8"
        // ];

        /**
         * Note: We use public sample database of KoolReport so it will work but
         * a little slow. To get the better experience of Dashboard demo, please
         * install the automaker database into your local mysql database and
         * provide connection
         */
        return [
            "connectionString"=>"mysql:host=sampledb.koolreport.com;dbname=dbautomaker_edit",
            "username"=>"expusr",
            "password"=>"koolreport sampledb",
            "charset"=>"utf8"
        ];
    }
}