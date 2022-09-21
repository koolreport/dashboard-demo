<?php

namespace demo\csvsource;

use \koolreport\dashboard\Dashboard;
use \koolreport\dashboard\containers\Panel;
use \koolreport\dashboard\containers\Row;

class CSVSourceBoard extends Dashboard
{
    protected function content()
    {
        return [
            Row::create([
                Panel::create()->header("<b>products.csv</b>")->sub([
                    CSVProductTable::create()
                ])
            ]),

            \demo\CodeDemo::create("
                CSV is a common type of datasource. Normally, CSV is raw and does not have query capability.
                But with our dashboard, CSV data can be queried like you query data from your database.
                Please look at the CSVProductTable.php file to see how data is queried from CSV file.
            ")->raw(true)
        ];
    }
}