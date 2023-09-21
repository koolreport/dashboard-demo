<?php

namespace demo\apexcharts;

use \koolreport\dashboard\widgets\apexcharts\ScatterChart;
use \koolreport\dashboard\fields\Text;
use \koolreport\dashboard\fields\Currency;
use \koolreport\dashboard\ColorList;

use  \demo\AutoMaker;

class ScatterChartDemo extends ScatterChart
{
    protected function onInit()
    {
        $this
        ->settings([
            "columns" => array(
                'SAMPLE A' => [
                    'combination' => [
                        'SampleA_x',
                        'SampleA_y',
                    ]
                ],
                'SAMPLE B' => [
                    'combination' => [
                        'SampleB_x',
                        'SampleB_y',
                    ]
                ],
                'SAMPLE C' => [
                    'combination' => [
                        'SampleC_x',
                        'SampleC_y',
                    ]
                ],
            ),
            "options" => [
                'chart | zoom | type' => 'xy',
                'xaxis' => [
                    'type' => 'category',
                    'tickAmount' => 10,
                    'labels | formatter' => 'function(val) {
                        return parseFloat(val).toFixed(1)
                    }',
                ],
                'yaxis | tickAmount' => 7,
            ],
        ])
        ->colorScheme(ColorList::random())
        ;
    }

    protected function dataSource()
    {
        return [
            [
                'SampleA_x',
                'SampleA_y',
                'SampleB_x',
                'SampleB_y',
                'SampleC_x',
                'SampleC_y',
            ],
            [
                16.4,
                5.4,
                36.4,
                13.4,
                21.7,
                3
            ],
            [
                21.7,
                2,
                1.7,
                11,
                23.6,
                3.5
            ],
            [
                25.4,
                3,
                5.4,
                8,
                24.6,
                3
            ],
            [
                19,
                2,
                9,
                17,
                29.9,
                3
            ],
            [
                10.9,
                1,
                1.9,
                4,
                21.7,
                20
            ],
            [
                13.6,
                3.2,
                3.6,
                12.2,
                23,
                2
            ],
            [
                10.9,
                7.4,
                1.9,
                14.4,
                10.9,
                3
            ],
            [
                10.9,
                0,
                1.9,
                9,
                28,
                4
            ],
            [
                10.9,
                8.2,
                1.9,
                13.2,
                27.1,
                0.3
            ],
            [
                16.4,
                0,
                1.4,
                7,
                16.4,
                4
            ],
            [
                16.4,
                1.8,
                6.4,
                8.8,
                13.6,
                0
            ],
            [
                13.6,
                0.3,
                3.6,
                4.3,
                19,
                5
            ],
            [
                13.6,
                0,
                1.6,
                10,
                22.4,
                3
            ],
            [
                29.9,
                0,
                9.9,
                2,
                24.5,
                3
            ],
            [
                27.1,
                2.3,
                7.1,
                15,
                32.6,
                3
            ],
            [
                16.4,
                0,
                1.4,
                0,
                27.1,
                4
            ],
            [
                13.6,
                3.7,
                3.6,
                13.7,
                29.6,
                6
            ],
            [
                10.9,
                5.2,
                1.9,
                15.2,
                31.6,
                8
            ],
            [
                16.4,
                6.5,
                6.4,
                16.5,
                21.6,
                5
            ],
            [
                10.9,
                0,
                0.9,
                10,
                20.9,
                4
            ],
            [
                24.5,
                7.1,
                4.5,
                17.1,
                22.4,
                0
            ],
            [
                10.9,
                0,
                10.9,
                10,
                32.6,
                10.3
            ],
            [
                8.1,
                4.7,
                0.1,
                14.7,
                29.7,
                20.8
            ],
            [
                19,
                0,
                9,
                10,
                24.5,
                0.8
            ],
            [
                21.7,
                1.8,
                12.7,
                11.8,
                21.4,
                0
            ],
            [
                27.1,
                0,
                2.1,
                10,
                21.7,
                6.9
            ],
            [
                24.5,
                0,
                2.5,
                10,
                28.6,
                7.7
            ],
            [
                27.1,
                0,
                27.1,
                10,
                15.4,
                0
            ],
            [
                29.9,
                1.5,
                2.9,
                11.5,
                18.1,
                0
            ],
            [
                27.1,
                0.8,
                7.1,
                10.8,
                33.4,
                0
            ],
            [
                22.1,
                2,
                2.1,
                12,
                16.4,
                0
            ]
        ];
    }

    protected function fields()
    {
        return [
            Text::create('SampleA_x'),
            Text::create('SampleA_y'),

            Text::create('SampleB_x'),
            Text::create('SampleB_y'),

            Text::create('SampleC_x'),
            Text::create('SampleC_y'),
        ];
    }
}