<?php

namespace demo\chartjs;

use \koolreport\dashboard\widgets\chartjs\ScatterChart;
use \koolreport\dashboard\fields\Number;
use koolreport\dashboard\ColorList;

class ScatterChartDemo extends ScatterChart
{
    protected function onInit()
    {
        $this->props([
            "series" => array(
                array("height", "weight", array(
                    "label" => "Height vs Weight",
                ))
            )
        ])
            ->colorScheme(ColorList::random());
    }

    protected function dataSource()
    {
        return [
            ["height", "weight"],
            [170, 82],
            [180, 91],
            [150, 60],
            [152, 55],
            [168, 65],
            [178, 67],
            [185, 46],
            [166, 77],
            [153, 50],
            [166, 44],
        ];
    }

    protected function fields()
    {
        return [
            Number::create("height"),
            Number::create("weight")
        ];
    }
}
