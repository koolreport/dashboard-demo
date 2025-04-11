<?php

namespace demo\d3;

use \koolreport\dashboard\widgets\d3\FunnelChart;
use \koolreport\dashboard\fields\Text;
use \koolreport\dashboard\fields\Number;

use  \demo\AutoMaker;

class FunnelChartDemo extends FunnelChart
{
    protected function onInit() {}

    protected function dataSource()
    {
        return [
            ["category" => "Visit", "amount" => 5000],
            ["category" => "Download", "amount" => 4000],
            ["category" => "Initial Checkout", "amount" => 2000],
            ["category" => "Purchase", "amount" => 1000],
        ];
    }

    protected function fields()
    {
        return [
            Text::create("category"),
            Number::create("amount")
        ];
    }
}
