<?php

namespace demo\googlecharts;

use \koolreport\dashboard\widgets\google\CandlestickChart;

class CandlestickDemo extends CandlestickChart
{
    protected function onInit()
    {
        $this->settings([
            "options" => [
                "legend" => [
                    "position" => "none"
                ]
            ]
        ]);
    }

    protected function dataSource()
    {
        return [
            ['Day', 'Open', 'High', 'Low', 'Close'],
            ['Mon', 20, 28, 38, 45],
            ['Tue', 31, 38, 55, 66],
            ['Wed', 50, 55, 77, 80],
            ['Thu', 77, 77, 66, 50],
            ['Fri', 68, 66, 22, 15]
        ];
    }

    protected function fields() {}
}
