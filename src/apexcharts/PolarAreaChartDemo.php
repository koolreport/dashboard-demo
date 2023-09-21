<?php

namespace demo\apexcharts;

use \koolreport\dashboard\widgets\apexcharts\PolarAreaChart;
use \koolreport\dashboard\fields\Text;
use \koolreport\dashboard\fields\Currency;
use \koolreport\dashboard\ColorList;

use  \demo\AutoMaker;

class PolarAreaChartDemo extends PolarAreaChart
{
    protected function onInit()
    {
        $this
        ->settings([
            "options" => [
                'plotOptions | polarArea' => [
                    'rings | strokeWidth' => 0,
                    'spokes | strokeWidth' => 0,
                ],
                'theme | monochrome | enabled' => true,
            ],
            'showYaxis' => false,
            "showLabel" => true,
            "maxWidth" => 492,
        ])
        ->colorScheme(ColorList::random())
        ;
    }

    protected function dataSource()
    {
        return [
            [
                'rose-type',
                'series-1'
            ],
            [
                "Rose A",
                42
            ],
            [
                "Rose B",
                47
            ],
            [
                "Rose C",
                52
            ],
            [
                "Rose D",
                58
            ],
            [
                "Rose E",
                65
            ]
        ];
    }

    protected function fields()
    {
        return [
            Text::create('rose-type'),
            Text::create('series-1'),
        ];
    }
}