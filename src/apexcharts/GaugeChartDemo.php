<?php

namespace demo\apexcharts;

use \koolreport\dashboard\widgets\apexcharts\RadialBarChart;
use \koolreport\dashboard\fields\Text;
use \koolreport\dashboard\fields\Currency;
use \koolreport\dashboard\ColorList;

use  \demo\AutoMaker;

class GaugeChartDemo extends RadialBarChart
{
    protected function onInit()
    {
        $this
        ->settings([
            "options" => [
                'plotOptions | radialBar' => [
                    'startAngle' => -135,
                    'endAngle' => 135,
                ],
                'stroke | dashArray' => 4,
            ],
            'widthHeightAutoRatio' => 2.23,
            "showLegend" => false,
        ])
        ->colorScheme(ColorList::random())
        ;
    }

    protected function dataSource()
    {
        return [
            [
                'label',
                'series-1'
            ],
            [
                'Median Ratio',
                67
            ]
        ];
    }

    protected function fields()
    {
        return [
            Text::create('label'),
            Text::create('series-1'),
        ];
    }
}