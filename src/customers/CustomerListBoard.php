<?php

namespace demo\customers;

use \koolreport\dashboard\Dashboard;
use \koolreport\dashboard\containers\Row;
use \koolreport\dashboard\containers\Panel;
use \koolreport\dashboard\widgets\Text;

class CustomerListBoard extends Dashboard
{
    use \koolreport\dashboard\TStatePersisted;

    protected function widgets()
    {
        return [
            Text::create()->text("<h2>Customers</h2>")->asHtml(true),
            CustomerListTable::create()
        ];
    }
}