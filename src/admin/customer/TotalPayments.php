<?php

namespace demo\admin\customer;

use demo\AdminAutoMaker;
use koolreport\dashboard\widgets\SimpleCard;

class TotalPayments extends SimpleCard
{
    protected function onCreated()
    {
        $this
        ->type("warning")
        ->text("Received Payments")
        ->icon("fas fa-dollar-sign")
        ->prefix("$");
    }

    protected function value()
    {
        return AdminAutoMaker::table("payments")->sum("amount")->run()->getScalar();
    }
}