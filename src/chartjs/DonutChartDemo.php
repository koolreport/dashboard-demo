<?php

namespace demo\chartjs;

use \koolreport\dashboard\widgets\chartjs\DonutChart;
use \koolreport\dashboard\fields\Text;
use \koolreport\dashboard\fields\Currency;
use \koolreport\dashboard\ColorList;

use  \demo\AutoMaker;

class DonutChartDemo extends DonutChart
{
    protected function onInit()
    {
        $this->title("Top 5 paid customers")
        ->colorScheme(ColorList::random())
        ->height("240px");
    }

    protected function dataSource()
    {
        return AutoMaker::table("payments")
                ->leftJoin("customers","customers.customerNumber","=","payments.customerNumber")
                ->groupBy("payments.customerNumber")
                ->select("customers.customerName")
                ->sum("amount")->alias("total")
                ->orderBy("total","desc")
                ->limit(5);
    }

    protected function fields()
    {
        return [
            Text::create("customerName"),
            Currency::create("total")
                ->USD()->symbol()
                ->decimals(0),
        ];
    }
}