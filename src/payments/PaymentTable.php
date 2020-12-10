<?php

namespace demo\payments;

use \koolreport\dashboard\widgets\Table;
use \koolreport\dashboard\fields\Text;
use \koolreport\dashboard\fields\Date;
use \koolreport\dashboard\fields\Currency;
use \demo\AutoMaker;

class PaymentTable extends Table
{
    protected function onInit()
    {
        $this
            ->pageSize(10);
            // ->updateEffect("none");
    }

    protected function dataSource()
    {
        //Get value from the date range picker
        $range = $this->sibling("PaymentDateRange")->value();

        //Apply to query
        return AutoMaker::table("payments")
                ->join("customers","customers.customerNumber","=","payments.customerNumber")
                ->whereBetween("paymentDate",$range)
                ->select("customerName","paymentDate","checkNumber","amount");
    }

    protected function fields()
    {
        return [
            Text::create("checkNumber"),
            Text::create("customerName"),
            Currency::create("amount")->USD()->symbol()->decimals(0),
            Date::create("paymentDate")->displayFormat("F j, Y")->sort("desc")
        ];
    }
}