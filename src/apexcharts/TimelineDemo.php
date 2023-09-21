<?php

namespace demo\apexcharts;

use \koolreport\dashboard\widgets\apexcharts\TimeLineChart;
use \koolreport\dashboard\fields\Text;
use \koolreport\dashboard\fields\Currency;
use \koolreport\dashboard\ColorList;

use  \demo\AutoMaker;
use koolreport\dashboard\fields\Date;

class TimelineDemo extends TimeLineChart
{
    protected function onInit()
    {
        $this->settings([
            "jsFiles" => ["moment.min.js"],
            "columns" => [
                'phase' => [
                    'categoryType' => 'datetime',
                ],
                'timeline' => [
                    'combination' => ['timeline_start', 'timeline_end']
                ]
            ],
            "options" => [
                'plotOptions | bar' => [
                    'distributed' => true,
                    'dataLabels | hideOverflowingLabels' => false
                ],
                'dataLabels' => [
                    'formatter' => "function(val, opts) {
                        var label = opts.w.globals.labels[opts.dataPointIndex]
                        var a = moment(val[0])
                        var b = moment(val[1])
                        var diff = b.diff(a, 'days')
                        return label + ': ' + diff + (diff > 1 ? ' days' : ' day')
                    }",
                ],
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
                'phase',
                'timeline_start',
                'timeline_end',
            ],
            [
                "Analysis",
                "2019-02-27",
                "2019-03-04"
            ],
            [
                "Code",
                "2019-3-2",
                "2019-3-4"
            ],
            [
                "Test",
                "2019-3-4",
                "2019-3-8"
            ],
            [
                "Validation",
                "2019-3-8",
                "2019-3-12"
            ],
            [
                "Deployment",
                "2019-3-12",
                "2019-3-18"
            ]
        ];
    }

    protected function fields()
    {
        return [
            Text::create("phase"),
            Text::create("timeline_start"),
            Text::create("timeline_end"),
        ];
    }
}
