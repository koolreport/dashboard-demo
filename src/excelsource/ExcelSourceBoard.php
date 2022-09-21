<?php

namespace demo\excelsource;

use \koolreport\dashboard\Dashboard;
use \koolreport\dashboard\containers\Panel;
use \koolreport\dashboard\containers\Row;

class ExcelSourceBoard extends Dashboard
{
    protected function content()
    {
        return [
            Row::create([
                Panel::create()->type("success")->header("<b>customer_product_dollarsales2.xlsx</b>")->sub([
                    ExcelCustomerTable::create()
                ])
            ]),

            \demo\CodeDemo::create("
                Excel is another common type of datasource. The same like CSV, 
                Excel file is raw and does not have query capability.
                However in KoolReport's Dashboard, Excel data can be queried like you query data from your database.
                Please look at the ExcelCustomerTable.php file to see how data is queried from Excel file.
            ")->raw(true)
        ];
    }
}