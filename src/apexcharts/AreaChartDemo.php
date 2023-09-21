<?php

namespace demo\apexcharts;

use \koolreport\dashboard\widgets\apexcharts\AreaChart;
use \koolreport\dashboard\fields\Text;
use \koolreport\dashboard\fields\Currency;
use \koolreport\dashboard\ColorList;

use  \demo\AutoMaker;

class AreaChartDemo extends AreaChart
{
    protected function onInit()
    {
        $this
        ->settings([
            "title" => "Area with Negative Values",
        ])
        ->colorScheme(ColorList::random())
        ;
    }

    protected function dataSource()
    {
        return [
            [
                "year",
                "north",
                "south"
            ],
            [
                1996,
                322,
                162
            ],
            [
                1997,
                324,
                90
            ],
            [
                1998,
                329,
                50
            ],
            [
                1999,
                342,
                77
            ],
            [
                2000,
                348,
                35
            ],
            [
                2001,
                334,
                -45
            ],
            [
                2002,
                325,
                -88
            ],
            [
                2003,
                316,
                -120
            ],
            [
                2004,
                318,
                -156
            ],
            [
                2005,
                330,
                -123
            ],
            [
                2006,
                355,
                -88
            ],
            [
                2007,
                366,
                -66
            ],
            [
                2008,
                337,
                -45
            ],
            [
                2009,
                352,
                -29
            ],
            [
                2010,
                377,
                -45
            ],
            [
                2011,
                383,
                -88
            ],
            [
                2012,
                344,
                -132
            ],
            [
                2013,
                366,
                -146
            ],
            [
                2014,
                389,
                -169
            ],
            [
                2015,
                334,
                -184
            ]
        ];
    }

    protected function fields()
    {
        return [
            Text::create('year'),
            Text::create('north'),
            Text::create('south'),
        ];
    }
}