<?php

namespace demo\admin\customer;

use demo\AdminAutoMaker;
use koolreport\dashboard\widgets\SimpleCard;

class TotalCustomers extends SimpleCard
{
    protected function onCreated()
    {
        $this
        ->type("primary")
        ->text("Customers")
        ->icon("fas fa-users");
    }

    protected function value()
    {
        return AdminAutoMaker::table("customers")->count()->run()->getScalar();
    }
}