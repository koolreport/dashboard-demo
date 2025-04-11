<?php

namespace demo\googlecharts;

use \koolreport\dashboard\widgets\google\Gauge;
use \koolreport\dashboard\fields\Text;
use \koolreport\dashboard\fields\Number;

class GaugeChartDemo extends Gauge
{
    protected function onInit() {}

    protected function dataSource()
    {
        return [
            ["label" => "Memory", "value" => 80],
            ["label" => "CPU", "value" => 55],
            ["label" => "Nework", "value" => 68],
        ];
    }

    protected function fields()
    {
        return [
            Text::create("label"),
            Number::create("value")
                ->suffix("%")
        ];
    }
}
