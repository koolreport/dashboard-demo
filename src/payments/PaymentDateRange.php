<?php

namespace demo\payments;

use \koolreport\dashboard\inputs\DateRangePicker;
use \demo\AutoMaker;

class PaymentDateRange extends DateRangePicker
{
    protected function onCreated()
    {
        $this->defaultValue($this::thisMonth());
    }

    protected function actionChange($request,$response)
    {
        //On client change, update table
        $this->sibling("PaymentByDate")->update();
        $this->sibling("PaymentTable")->update();
        $this->sibling("PaymentByCustomer")->update();
        
    }
}