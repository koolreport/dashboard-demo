<?php

namespace demo\table;

use \koolreport\dashboard\widgets\Table;
use \koolreport\dashboard\fields\Text;
use \koolreport\dashboard\fields\Currency;


use \demo\AutoMaker;


class WithFooterTable extends Table
{
    protected function onInit()
    {
        $this->showFooter(true);
    }

    protected function dataSource()
    {
        return AutoMaker::table("payments")
                ->leftJoin("customers","customers.customerNumber","=","payments.customerNumber")
                ->select("amount","customerName")
                ->take(5)
                ->run();
    }

    protected function fields()
    {
        return [
            Text::create("customerName")
                ->footerText("<b>Total</b>"),
            Currency::create("amount")
                ->USD()
                ->symbol()
                ->decimals(0)
                ->footer("sum"),
        ];
    }
}