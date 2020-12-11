<?php

namespace demo\payments;

use \koolreport\dashboard\widgets\google\BarChart;
use \koolreport\dashboard\fields\Text;
use \koolreport\dashboard\fields\Date;
use \koolreport\dashboard\fields\Currency;
use \demo\AutoMaker;

class PaymentByCustomer extends BarChart
{
    protected function onInit()
    {
        $this
            ->title("Payment By Customer")
            //->updateEffect("none")
            ->height("240px");
    }
    protected function dataSource()
    {
        //Get value from the date range picker
        $range = $this->sibling("PaymentDateRange")->value();

        //Apply to query
        return AutoMaker::table("payments")
                ->whereBetween("paymentDate",$range)
                ->join("customers","customers.customerNumber","=","payments.customerNumber")
                ->groupBy("customers.customerNumber")
                ->sum("amount")->alias("customerAmount")
                ->select("customerName")
                ->orderBy("customerAmount","desc");
    }

    protected function fields()
    {
        return [
            Text::create("customerName"),
            Currency::create("customerAmount")->USD()->symbol()->decimals(0)
        ];
    }
}