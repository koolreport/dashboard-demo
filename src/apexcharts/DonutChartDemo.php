<?php

namespace demo\apexcharts;

use \koolreport\dashboard\widgets\apexcharts\DonutChart;
use \koolreport\dashboard\fields\Text;
use \koolreport\dashboard\fields\Number;
use \koolreport\dashboard\fields\Currency;
use \koolreport\dashboard\ColorList;

use  \demo\AutoMaker;

class DonutChartDemo extends DonutChart
{
    protected function onInit()
    {
        $this->settings([
            'widthHeightAutoRatio' => 2,
            "showLabel" => true,
            "maxWidth" => 395,
        ])
        ->colorScheme(ColorList::random())
        ;
    }

    protected function dataSource()
    {
        return [
            [
                'value'
            ],
            [
                44
            ],
            [
                55
            ],
            [
                41
            ],
            [
                17
            ],
            [
                15
            ]
        ];
    }

    protected function fields()
    {
        return [
            Text::create("value"),
        ];
    }
}