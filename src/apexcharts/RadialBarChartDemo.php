<?php

namespace demo\apexcharts;

use \koolreport\dashboard\widgets\apexcharts\RadialBarChart;
use \koolreport\dashboard\fields\Text;
use \koolreport\dashboard\fields\Currency;
use \koolreport\dashboard\ColorList;

use  \demo\AutoMaker;

class RadialBarChartDemo extends RadialBarChart
{
    protected function onInit()
    {
        $this
        ->settings([
            "options" => [
                'plotOptions | radialBar | dataLabels' => [
                    'total' => [
                        'show' => true,
                        'label' => 'Total',
                        'formatter' => 'function (w) {
                            // By default this function returns the average of all series. The below is just an example to show the use of custom formatter function
                            return 249;
                        }'
                    ]
                ]
            ],
            'widthHeightAutoRatio' => 2,
            "showLegend" => false,
        ])
        ->colorScheme(ColorList::random())
        ;
    }

    protected function dataSource()
    {
        return [
            [
                'fruit',
                'series-1'
            ],
            [
                "Apples",
                44
            ],
            [
                "Oranges",
                55
            ],
            [
                "Bananas",
                67
            ],
            [
                "Berries",
                83
            ]
        ];
    }

    protected function fields()
    {
        return [
            Text::create('fruit'),
            Text::create('series-1'),
        ];
    }
}