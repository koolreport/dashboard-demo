<?php

namespace demo\excelsource;

use \koolreport\dashboard\widgets\Table;
use \koolreport\dashboard\sources\Excel;
use \koolreport\dashboard\fields\Text;
use \koolreport\dashboard\fields\Number;
use \koolreport\dashboard\fields\Currency;


class ExcelCustomerTable extends Table
{
    protected function onCreated()
    {
        $this->pageSize(10);
    }

    protected function dataSource()
    {
        return Excel::file("data/customer_product_dollarsales2.xlsx")
                ->groupBy("customerName")
                ->select("customerName")
                ->sum("dollar_sales")->alias("amount");
    }

    protected function fields()
    {
        return [
            Text::create("customerName"),
            Currency::create("amount")->USD()->symbol()->decimals(2),
        ];
    }
}