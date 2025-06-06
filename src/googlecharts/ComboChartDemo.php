<?php

namespace demo\googlecharts;

use \koolreport\dashboard\widgets\google\ComboChart;
use \koolreport\dashboard\fields\Text;
use \koolreport\dashboard\fields\Number;
use \koolreport\dashboard\fields\Currency;
use \koolreport\dashboard\ColorList;

use  \demo\AutoMaker;

class ComboChartDemo extends ComboChart
{
    protected function onCreated()
    {
        $this->title("Top 5 paid customers")
            ->colorScheme(ColorList::random())
            ->height("360px");
    }

    protected function dataSource()
    {
        return AutoMaker::table("payments")
            ->leftJoin("customers", "customers.customerNumber", "=", "payments.customerNumber")
            ->groupBy("payments.customerNumber")
            ->sum("amount")->alias("total")
            ->sum("customers.customerNumber * 200")->alias("CustomerNumber")
            ->select("customers.customerName")
            ->orderBy("total", "desc")
            ->limit(5);
    }

    protected function fields()
    {
        return [
            Text::create("customerName"),
            Number::create("CustomerNumber")
                ->chartType("line"),
            Currency::create("total")
                ->USD()->symbol()
                ->decimals(0),
        ];
    }
}
