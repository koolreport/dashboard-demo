<?php

namespace demo\apexcharts;

use \koolreport\dashboard\widgets\apexcharts\RangeAreaChart;
use \koolreport\dashboard\fields\Text;
use \koolreport\dashboard\fields\Currency;
use \koolreport\dashboard\ColorList;

use  \demo\AutoMaker;

class RangeAreaChartDemo extends RangeAreaChart
{
    protected function onInit()
    {
        $this
        ->colorScheme(ColorList::random())
        ->settings([
            "title" => "New York Temperature (all year round)",
            "columns" => array(
                "month" => [
                    'label' => 'Month',
                ],
                'temp_range' => [
                    'label' => 'Temperature Range',
                    'combination' => [
                        "temp_min",
                        "temp_max"
                    ]
                ]
            ),
            'strokeCurve' => 'straight',
        ])
        ;
    }

    protected function dataSource()
    {
        return [
            [
                'month',
                'temp_min',
                'temp_max',
            ],
            [
                "Jan",
                -2,
                4
            ],
            [
                "Feb",
                -1,
                6
            ],
            [
                "Mar",
                3,
                10
            ],
            [
                "Apr",
                8,
                16
            ],
            [
                "May",
                13,
                22
            ],
            [
                "Jun",
                18,
                26
            ],
            [
                "Jul",
                21,
                29
            ],
            [
                "Aug",
                21,
                28
            ],
            [
                "Sep",
                17,
                24
            ],
            [
                "Oct",
                11,
                18
            ],
            [
                "Nov",
                6,
                12
            ],
            [
                "Dec",
                1,
                7
            ]
        ];
    }

    protected function fields()
    {
        return [
            Text::create('month'),
            Text::create('temp_min'),
            Text::create('temp_max'),
        ];
    }
}