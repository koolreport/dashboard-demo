<?php

namespace demo\apexcharts;

use \koolreport\dashboard\widgets\apexcharts\ColumnChart;
use \koolreport\dashboard\fields\Text;
use \koolreport\dashboard\fields\Currency;
use \koolreport\dashboard\ColorList;

use  \demo\AutoMaker;

class ColumnChartDemo extends ColumnChart
{
    protected function onCreated()
    {
        $this->settings([
            "stacked" => true,
            "stackType" => "100%",
            "options" => [
                "xaxis | type" => "datetime"
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
                'Product A',
                'Product B',
                'Product C',
                'Product D',
            ],
            [
                "01/01/2011 GMT",
                44,
                13,
                11,
                21
            ],
            [
                "01/02/2011 GMT",
                55,
                23,
                17,
                7
            ],
            [
                "01/03/2011 GMT",
                41,
                20,
                15,
                25
            ],
            [
                "01/04/2011 GMT",
                67,
                8,
                15,
                13
            ],
            [
                "01/05/2011 GMT",
                22,
                13,
                21,
                22
            ],
            [
                "01/06/2011 GMT",
                43,
                27,
                14,
                8
            ]
        ];
    }

    protected function fields()
    {
        return [
            Text::create("date"),
            Text::create("Product A"),
            Text::create("Product B"),
            Text::create("Product C"),
            Text::create("Product D"),
        ];
    }
}