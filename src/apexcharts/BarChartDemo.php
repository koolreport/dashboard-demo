<?php

namespace demo\apexcharts;

use \koolreport\dashboard\widgets\apexcharts\BarChart;
use \koolreport\dashboard\fields\Text;
use \koolreport\dashboard\fields\Currency;
use \koolreport\dashboard\ColorList;

use  \demo\AutoMaker;

class BarChartDemo extends BarChart
{
    protected function onInit()
    {
        $this->title("Mauritius population pyramid 2011")
        ->colorScheme(ColorList::random())
        ->settings([
            "options" => [
                'plotOptions | bar' => [
                    'borderRadius' => 5,
                    'borderRadiusApplication' => 'end',
                    'borderRadiusWhenStacked' => 'all',
                    'barHeight' => '80%'
                ],
            ],
            "stacked" => true,
            "strokeWidth" => 1,
            "xTitle" => "Percent",
            "yTitle" => "Age Group",
        ])
        ;
    }

    protected function dataSource()
    {
        return [
            [
                'Age Group',
                'Males',
                'Females',
            ],
            [
                "85+",
                0.4,
                -0.8
            ],
            [
                "80-84",
                0.65,
                -1.05
            ],
            [
                "75-79",
                0.76,
                -1.06
            ],
            [
                "70-74",
                0.88,
                -1.18
            ],
            [
                "65-69",
                1.5,
                -1.4
            ],
            [
                "60-64",
                2.1,
                -2.2
            ],
            [
                "55-59",
                2.9,
                -2.85
            ],
            [
                "50-54",
                3.8,
                -3.7
            ],
            [
                "45-49",
                3.9,
                -3.96
            ],
            [
                "40-44",
                4.2,
                -4.22
            ],
            [
                "35-39",
                4,
                -4.3
            ],
            [
                "30-34",
                4.3,
                -4.4
            ],
            [
                "25-29",
                4.1,
                -4.1
            ],
            [
                "20-24",
                4.2,
                -4
            ],
            [
                "15-19",
                4.5,
                -4.1
            ],
            [
                "10-14",
                3.9,
                -3.4
            ],
            [
                "5-9",
                3.5,
                -3.1
            ],
            [
                "0-4",
                3,
                -2.8
            ]
        ];
    }

    protected function fields()
    {
        return [
            Text::create('Age Group'),
            Text::create('Males'),
            Text::create('Females'),
        ];
    }
}