<?php

namespace demo\apexcharts;

use \koolreport\dashboard\widgets\apexcharts\BubbleChart;
use \koolreport\dashboard\fields\Text;
use \koolreport\dashboard\fields\Currency;
use \koolreport\dashboard\ColorList;

use  \demo\AutoMaker;

class BubbleChartDemo extends BubbleChart
{
    protected function onInit()
    {
        $this
        ->settings([
            "title" => "Simple Bubble Chart",
            "columns" => array(
                "Bubble1" => [
                    'combination' => [
                        'Bubble1_x',
                        'Bubble1_y',
                        'Bubble1_z',
                    ]
                ],
                "Bubble2" => [
                    'combination' => [
                        'Bubble2_x',
                        'Bubble2_y',
                        'Bubble2_z',
                    ]
                ],
                "Bubble3" => [
                    'combination' => [
                        'Bubble3_x',
                        'Bubble3_y',
                        'Bubble3_z',
                    ]
                ],
                "Bubble4" => [
                    'combination' => [
                        'Bubble4_x',
                        'Bubble4_y',
                        'Bubble4_z',
                    ]
                ],
            ),
            "options" => [
                'xaxis | tickAmount' => 12,
                'yaxis | max' => 70,
            ],
            'fillOpacity' => 0.8,
        ])
        ->colorScheme(ColorList::random())
        ;
    }

    protected function dataSource()
    {
        return [
            [
                'Bubble1_x',
                'Bubble1_y',
                'Bubble1_z',

                'Bubble2_x',
                'Bubble2_y',
                'Bubble2_z',

                'Bubble3_x',
                'Bubble3_y',
                'Bubble3_z',

                'Bubble4_x',
                'Bubble4_y',
                'Bubble4_z',
            ],
            [
                1,
                36,
                59,
                747,
                19,
                56,
                617,
                37,
                22,
                511,
                60,
                74
            ],
            [
                198,
                29,
                26,
                300,
                32,
                60,
                301,
                16,
                64,
                98,
                28,
                17
            ],
            [
                732,
                36,
                47,
                134,
                51,
                64,
                294,
                13,
                51,
                408,
                18,
                45
            ],
            [
                193,
                15,
                64,
                74,
                11,
                23,
                253,
                22,
                38,
                118,
                50,
                30
            ],
            [
                676,
                33,
                29,
                479,
                29,
                30,
                236,
                41,
                27,
                163,
                27,
                60
            ],
            [
                186,
                19,
                34,
                381,
                36,
                21,
                214,
                60,
                26,
                311,
                58,
                50
            ],
            [
                78,
                51,
                47,
                738,
                27,
                61,
                497,
                36,
                62,
                339,
                42,
                72
            ],
            [
                634,
                47,
                19,
                200,
                43,
                70,
                96,
                28,
                28,
                370,
                33,
                20
            ],
            [
                405,
                16,
                67,
                350,
                32,
                71,
                225,
                18,
                73,
                565,
                17,
                49
            ],
            [
                349,
                34,
                42,
                351,
                59,
                34,
                545,
                40,
                46,
                455,
                27,
                38
            ],
            [
                176,
                10,
                16,
                596,
                54,
                60,
                367,
                28,
                32,
                167,
                51,
                44
            ],
            [
                746,
                56,
                62,
                419,
                52,
                47,
                293,
                30,
                41,
                488,
                35,
                18
            ],
            [
                429,
                49,
                53,
                231,
                27,
                33,
                242,
                27,
                21,
                473,
                44,
                24
            ],
            [
                259,
                29,
                31,
                335,
                38,
                54,
                547,
                30,
                15,
                602,
                20,
                18
            ],
            [
                264,
                42,
                37,
                48,
                34,
                42,
                264,
                37,
                26,
                345,
                47,
                73
            ],
            [
                40,
                36,
                24,
                8,
                45,
                38,
                653,
                56,
                73,
                402,
                12,
                54
            ],
            [
                341,
                26,
                26,
                336,
                57,
                22,
                596,
                21,
                46,
                286,
                35,
                37
            ],
            [
                49,
                60,
                48,
                322,
                24,
                40,
                148,
                54,
                64,
                286,
                53,
                66
            ],
            [
                67,
                60,
                41,
                183,
                28,
                58,
                739,
                27,
                53,
                686,
                38,
                18
            ],
            [
                527,
                19,
                48,
                702,
                10,
                44,
                506,
                55,
                22,
                550,
                23,
                52
            ]
        ];
    }

    protected function fields()
    {
        return [
            Text::create('Bubble1_x'),
            Text::create('Bubble1_y'),
            Text::create('Bubble1_z'),

            Text::create('Bubble2_x'),
            Text::create('Bubble2_y'),
            Text::create('Bubble2_z'),

            Text::create('Bubble3_x'),
            Text::create('Bubble3_y'),
            Text::create('Bubble3_z'),

            Text::create('Bubble4_x'),
            Text::create('Bubble4_y'),
            Text::create('Bubble4_z'),
        ];
    }
}