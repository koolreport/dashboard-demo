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
            CustomerListTable::create(),
            \demo\CodeDemo::create("
                This examples demonstrates another type of master-detail model. In this example, we use two dashboards.
                CustomerListBoard will acts as master and CustomerDetailsBoard acts as detail.
                As you can see, on clicking to View Details button on the master, the detail board will load
                to show information of the selected customer.
                <br/><br/>
                The CustomerListBoard uses a Table with searchable feature, allowing us to search for any customers. 
                <br/><br/>
                Furthermore, the CustomerListBoard use a special trait called <b>TStatePersisted</b> which will make CustomerListBoard
                maintains its state including paging and searching text when we come back from detail board.
            ")->raw(true)
        ];
    }
}