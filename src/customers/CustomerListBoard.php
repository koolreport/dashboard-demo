<?php

namespace demo\customers;

use \koolreport\dashboard\Dashboard;
use \koolreport\dashboard\containers\Row;
use \koolreport\dashboard\containers\Panel;
use \koolreport\dashboard\containers\Html;

class CustomerListBoard extends Dashboard
{
    // Include the TStatePersisted to make Dashboard state persisted
    // so when we come back to Dashboard again, it will resume to
    // exact state when we left, all selection, table paging will
    // be remained the same.
    use \koolreport\dashboard\TStatePersisted;

    protected function widgets()
    {
        return [
            Html::h2("Customers"),
            CustomerListTable::create()
        ];
    }
}