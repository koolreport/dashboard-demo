<?php

namespace demo\apexcharts;

use \koolreport\dashboard\widgets\apexcharts\ComboChart;
use \koolreport\dashboard\fields\Text;
use \koolreport\dashboard\fields\Currency;
use \koolreport\dashboard\ColorList;

use  \demo\AutoMaker;

class ComboChartDemo extends ComboChart
{
    protected function onInit()
    {
        $this
        ->colorScheme(ColorList::random())
        ->settings([
            "columns" => array(
                "Date" => [
                    "categoryType" => "datetime"
                ],
                "Team A" => [
                    "chartType" => "column",
                ],
                "Team B" => [
                    "chartType" => "area",
                ],
                "Team C" => [
                    "chartType" => "line",
                ],
            ),
            "yTitle" => "Points",
            'strokeWidth' => [
                0,
                2,
                5
            ],
            'fillOpacity' => [
                0.85,
                0.25,
                1
            ],
        ])
        ;
    }

    protected function dataSource()
    {
        return [
            [
                'Date',
                'Team A',
                'Team B',
                'Team C',
            ],
            [
                "01/01/2003",
                23,
                44,
                30
            ],
            [
                "02/01/2003",
                11,
                55,
                25
            ],
            [
                "03/01/2003",
                22,
                41,
                36
            ],
            [
                "04/01/2003",
                27,
                67,
                30
            ],
            [
                "05/01/2003",
                13,
                22,
                45
            ],
            [
                "06/01/2003",
                22,
                43,
                35
            ],
            [
                "07/01/2003",
                37,
                21,
                64
            ],
            [
                "08/01/2003",
                21,
                41,
                52
            ],
            [
                "09/01/2003",
                44,
                56,
                59
            ],
            [
                "10/01/2003",
                22,
                27,
                36
            ],
            [
                "11/01/2003",
                30,
                43,
                39
            ]
        ];
    }

    protected function fields()
    {
        return [
            Text::create('Date'),
            Text::create('Team A'),
            Text::create('Team B'),
            Text::create('Team C'),
        ];
    }
}