<?php

namespace demo\apexcharts;

use \koolreport\dashboard\widgets\apexcharts\BoxPlotChart;
use \koolreport\dashboard\fields\Text;
use \koolreport\dashboard\fields\Currency;
use \koolreport\dashboard\ColorList;

use  \demo\AutoMaker;

class BoxPlotChartDemo extends BoxPlotChart
{
    protected function onInit()
    {
        $this
        ->settings([
            "title" => "Basic BoxPlot Chart",
            "columns" => array(
                "month" => [
                    "label" => "Month"
                ],
                'boxplot' => [
                    'combination' => [
                        'min',
                        'per25',
                        'median',
                        'per75',
                        'max',
                    ]
                ]
            ),
            "showLegend" => false,
        ])
        // ->colorScheme(ColorList::random())
        ;
    }

    protected function dataSource()
    {
        return [
            [
                'month',
                'min',
                'per25',
                'median',
                'per75',
                'max',
            ],
            [
                "Jan 2015",
                54,
                66,
                69,
                75,
                88
            ],
            [
                "Jan 2016",
                43,
                65,
                69,
                76,
                81
            ],
            [
                "Jan 2017",
                31,
                39,
                45,
                51,
                59
            ],
            [
                "Jan 2018",
                39,
                46,
                55,
                65,
                71
            ],
            [
                "Jan 2019",
                29,
                31,
                35,
                39,
                44
            ],
            [
                "Jan 2020",
                41,
                49,
                58,
                61,
                67
            ],
            [
                "Jan 2021",
                54,
                59,
                66,
                71,
                88
            ]
        ];
    }

    protected function fields()
    {
        return [
            Text::create('month'),
            Text::create('min'),
            Text::create('per25'),
            Text::create('median'),
            Text::create('per75'),
            Text::create('max'),
        ];
    }
}