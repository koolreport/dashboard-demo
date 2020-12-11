<?php

namespace demo\payments;

use \koolreport\dashboard\widgets\google\ColumnChart;
use \koolreport\dashboard\fields\Text;
use \koolreport\dashboard\fields\Date;
use \koolreport\dashboard\fields\Currency;
use \demo\AutoMaker;

class PaymentByDate extends ColumnChart
{
    protected function onInit()
    {
        $this
            ->title("Payment By Date")
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
                ->groupBy("paymentDate")
                ->sum("amount")->alias("dayAmount")
                ->select("paymentDate");
    }

    protected function fields()
    {
        return [
            Date::create("paymentDate")->displayFormat("M jS"),
            Currency::create("dayAmount")->USD()->symbol()->decimals(0)
        ];
    }
}