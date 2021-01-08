<?php

namespace demo\excelsource;

use \koolreport\dashboard\Dashboard;
use \koolreport\dashboard\containers\Panel;
use \koolreport\dashboard\containers\Row;

class ExcelSourceBoard extends Dashboard
{
    protected function widgets()
    {
        return [
            Row::create([
                Panel::create()->type("success")->header("<b>customer_product_dollarsales2.xlsx</b>")->sub([
                    ExcelCustomerTable::create()
                ])
            ])
        ];
    }
}