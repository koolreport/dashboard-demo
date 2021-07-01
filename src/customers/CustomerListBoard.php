<?php

namespace demo\customers;

use \koolreport\dashboard\Dashboard;
use \koolreport\dashboard\containers\Row;
use \koolreport\dashboard\containers\Panel;
use \koolreport\dashboard\containers\Html;

class CustomerListBoard extends Dashboard
{
    use \koolreport\dashboard\TStatePersisted;

    protected function widgets()
    {
        return [
            Html::h2("Customers"),
            CustomerListTable::create()
        ];
    }
}