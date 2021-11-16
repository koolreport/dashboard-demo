<?php

namespace demo\admin\customer;

use demo\AdminAutoMaker;
use koolreport\dashboard\widgets\SimpleCard;

class TotalShippedOrders extends SimpleCard
{
    protected function onCreated()
    {
        $this
        ->type("danger")
        ->text("Shipped Orders")
        ->icon("far fa-copy");
    }

    protected function value()
    {
        return AdminAutoMaker::table("orders")->where("status","Shipped")->count()->run()->getScalar();
    }
}