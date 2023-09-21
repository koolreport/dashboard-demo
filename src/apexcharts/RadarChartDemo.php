<?php

namespace demo\apexcharts;

use \koolreport\dashboard\widgets\apexcharts\RadarChart;
use \koolreport\dashboard\fields\Text;
use \koolreport\dashboard\fields\Currency;
use \koolreport\dashboard\ColorList;

use  \demo\AutoMaker;

class RadarChartDemo extends RadarChart
{
    protected function onInit()
    {
        $this->title("Basic Radar Chart")
        ->settings([
            "showLegend" => false,
        ])
        ->colorScheme(ColorList::random());
    }

    protected function dataSource()
    {
        return [
            [
                'month',
                'series-1'
            ],
            [
                "January",
                80
            ],
            [
                "February",
                50
            ],
            [
                "March",
                30
            ],
            [
                "April",
                40
            ],
            [
                "May",
                100
            ],
            [
                "June",
                20
            ]
        ];
    }

    protected function fields()
    {
        return [
            Text::create('month'),
            Text::create('series-1'),
        ];
    }
}