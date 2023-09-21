<?php

namespace demo\apexcharts;

use \koolreport\dashboard\widgets\apexcharts\PieChart;
use \koolreport\dashboard\fields\Text;
use \koolreport\dashboard\fields\Currency;
use \koolreport\dashboard\ColorList;

use  \demo\AutoMaker;

class PieChartDemo extends PieChart
{
    protected function onInit()
    {
        $this->settings([
            "title" => "Monochrome Pie",
            "options" => [
                'theme | monochrome | enabled' => true,
            ],
            "showLabel" => true,
            "maxWidth" => 400,
        ])
        ->colorScheme(ColorList::random())
        ;
    }

    protected function dataSource()
    {
        return [
            [
                'weekday',
                'value'
            ],
            [
                "Monday",
                25
            ],
            [
                "Tuesday",
                15
            ],
            [
                "Wednesday",
                44
            ],
            [
                "Thursday",
                55
            ],
            [
                "Friday",
                41
            ],
            [
                "Saturday",
                17
            ]
        ];
    }

    protected function fields()
    {
        return [
            Text::create('weekday'),
            Text::create('value'),
        ];
    }
}