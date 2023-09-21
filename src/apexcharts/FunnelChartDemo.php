<?php

namespace demo\apexcharts;

use \koolreport\dashboard\widgets\apexcharts\FunnelChart;
use \koolreport\dashboard\fields\Text;
use \koolreport\dashboard\fields\Currency;
use \koolreport\dashboard\ColorList;

use  \demo\AutoMaker;

class FunnelChartDemo extends FunnelChart
{
    protected function onInit()
    {
        $this
        ->settings([
            "title" => "Pyramid Chart",
            "options" => [
                'plotOptions | bar | distributed' => true,
                'dataLabels' => [
                    'formatter' => 'function (val, opt) {
                        return opt.w.globals.labels[opt.dataPointIndex] 
                    }',
                    'dropShadow | enabled' => true,
                ]
            ],
            "showLegend" => false,
            "showLabel" => true,
        ])
        ->colorScheme(ColorList::random())
        ;
    }

    protected function dataSource()
    {
        return [
            [
                'product',
                'sale'
            ],
            [
                "Sweets",
                200
            ],
            [
                "Processed Foods",
                330
            ],
            [
                "Healthy Fats",
                548
            ],
            [
                "Meat",
                740
            ],
            [
                "Beans & Legumes",
                880
            ],
            [
                "Dairy",
                990
            ],
            [
                "Fruits & Vegetables",
                1100
            ],
            [
                "Grains",
                1380
            ]
        ];
    }

    protected function fields()
    {
        return [
            Text::create('product'),
            Text::create('sale'),
        ];
    }
}