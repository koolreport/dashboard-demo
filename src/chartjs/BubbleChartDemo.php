<?php

namespace demo\chartjs;

use \koolreport\dashboard\widgets\chartjs\BubbleChart;
use \koolreport\dashboard\fields\Number;

use  \demo\AutoMaker;
use koolreport\dashboard\ColorList;

class BubbleChartDemo extends BubbleChart
{
    protected function onInit()
    {
        $this->props([
            "series" => array(
                array("height", "weight", "smokers"),
            ),
        ])
            ->colorScheme(ColorList::random());
    }

    protected function dataSource()
    {
        return [
            ["height", "weight", "smokers"],
            [170, 82, 123],
            [180, 91, 45],
            [150, 60, 14],
            [152, 55, 55],
            [168, 65, 223],
            [178, 67, 55],
            [185, 46, 223],
            [166, 77, 55],
            [153, 50, 77],
            [166, 44, 155],
        ];
    }

    protected function fields()
    {
        return [
            Number::create("height"),
            Number::create("weight"),
            Number::create("smokers")
        ];
    }
}
