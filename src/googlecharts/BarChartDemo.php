<?php

namespace demo\googlecharts;

use \koolreport\dashboard\widgets\google\BarChart;
use \koolreport\dashboard\fields\Text;
use \koolreport\dashboard\fields\Currency;
use \koolreport\dashboard\ColorList;

use  \demo\AutoMaker;

class BarChartDemo extends BarChart
{
    protected function onInit()
    {
        $this->title("Top 5 paid customers")
        ->colorScheme(ColorList::random())
        ->height("240px");
    }

    protected function excelSetting()
    {
        return [
            "direction" => null, // to show vertical column chart in MacOS's Number
            "layout" => null // to show chart in MacOS's Number
        ];
    }
    protected function dataSource()
    {
        return AutoMaker::table("payments")
                ->leftJoin("customers","customers.customerNumber","=","payments.customerNumber")
                ->groupBy("payments.customerNumber")
                ->sum("amount")->alias("total")
                ->select("customers.customerName")
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