<?php

namespace demo\apexcharts;

use \koolreport\dashboard\widgets\apexcharts\LineChart;
use \koolreport\dashboard\fields\Text;
use \koolreport\dashboard\fields\Currency;
use \koolreport\dashboard\ColorList;

use  \demo\AutoMaker;

class LineChartDemo extends LineChart
{
    protected function onInit()
    {
        $this
        ->settings([
            "title" => "Page Statistics",
            "options" => [
                'stroke | dashArray' => [0, 8, 5],
            ],
        ])
        ->colorScheme(ColorList::random())
        ;
    }

    protected function dataSource()
    {
        return [
            [
                'date',
                'Session Duration',
                'Page Views',
                'Total Visits'
            ],
            [
                "01 Jan",
                45,
                35,
                87
            ],
            [
                "02 Jan",
                52,
                41,
                57
            ],
            [
                "03 Jan",
                38,
                62,
                74
            ],
            [
                "04 Jan",
                24,
                42,
                99
            ],
            [
                "05 Jan",
                33,
                13,
                75
            ],
            [
                "06 Jan",
                26,
                18,
                38
            ],
            [
                "07 Jan",
                21,
                29,
                62
            ],
            [
                "08 Jan",
                20,
                37,
                47
            ],
            [
                "09 Jan",
                6,
                36,
                82
            ],
            [
                "10 Jan",
                8,
                51,
                56
            ],
            [
                "11 Jan",
                15,
                32,
                45
            ],
            [
                "12 Jan",
                10,
                35,
                47
            ]
        ];
    }

    protected function fields()
    {
        return [
            Text::create('date'),
            Text::create('Session Duration'),
            Text::create('Page Views'),
            Text::create('Total Visits'),
        ];
    }
}