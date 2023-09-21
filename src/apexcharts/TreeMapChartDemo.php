<?php

namespace demo\apexcharts;

use \koolreport\dashboard\widgets\apexcharts\TreeMapChart;
use \koolreport\dashboard\fields\Text;
use \koolreport\dashboard\fields\Currency;
use \koolreport\dashboard\ColorList;

use  \demo\AutoMaker;

class TreeMapChartDemo extends TreeMapChart
{
    protected function onInit()
    {
        $this
            ->settings([
                "title" => "Distibuted Treemap (different color for each cell)",
                "options" => [
                    'plotOptions | treemap' => [
                        'distributed' => true,
                        'enableShades' => false
                    ]
                ],
                'widthHeightAutoRatio' => 1.9,
                "showLegend" => false,
                "showLabel" => true,
            ])
            ->colorScheme(ColorList::random());
    }

    protected function dataSource()
    {
        return [
            [
                'state',
                'population'
            ],
            [
                "Michigan",
                10
            ],
            [
                "California",
                39
            ],
            [
                "Pennsylvania",
                12
            ],
            [
                "Washington",
                7
            ],
            [
                "North Carolina",
                10
            ],
            [
                "Virginia",
                8
            ],
            [
                "Georgia",
                10
            ],
            [
                "Texas",
                30
            ],
            [
                "New York",
                19
            ],
            [
                "Tennessee",
                7
            ],
            [
                "Ohio",
                11
            ],
            [
                "Illinois",
                12
            ],
            [
                "Arizona",
                7
            ],
            [
                "Florida",
                22
            ],
            [
                "New Jersey",
                9
            ]
        ];
    }

    protected function fields()
    {
        return [
            Text::create('state'),
            Text::create('population'),
        ];
    }
}
