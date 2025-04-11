<?php

namespace demo\d3;

use \koolreport\dashboard\widgets\d3\GaugeChart;
use \koolreport\dashboard\fields\Text;
use \koolreport\dashboard\fields\Number;

class GaugeChartDemo extends GaugeChart
{
    protected function onInit() {}

    protected function dataSource()
    {
        return [
            ["label" => "data", "data1" => 91.4]
        ];
    }

    protected function fields()
    {
        return [
            Text::create("label"),
            Number::create("data1"),
        ];
    }
}
