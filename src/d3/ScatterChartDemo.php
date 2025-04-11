<?php

namespace demo\d3;

use koolreport\dashboard\ColorList;
use \koolreport\dashboard\widgets\d3\ScatterChart;
use \koolreport\dashboard\fields\Number;

class ScatterChartDemo extends ScatterChart
{
    protected function onInit()
    {
        $this->props([
            "series" => array(
                array('setosa_x', 'setosa'),
                array('versicolor_x', 'versicolor')
            )
        ])
            ->colorScheme(ColorList::random());
    }

    protected function dataSource()
    {
        return [
            ['setosa_x' => 3.5, 'versicolor_x' => 3.2, 'setosa' => 0.2, 'versicolor' => 1.4],
            ['setosa_x' => 3.0, 'versicolor_x' => 3.2, 'setosa' => 0.2, 'versicolor' => 1.5],
            ['setosa_x' => 3.2, 'versicolor_x' => 3.1, 'setosa' => 0.2, 'versicolor' => 1.5],
            ['setosa_x' => 3.1, 'versicolor_x' => 2.3, 'setosa' => 0.2, 'versicolor' => 1.3],
            ['setosa_x' => 3.6, 'versicolor_x' => 2.8, 'setosa' => 0.2, 'versicolor' => 1.5],
            ['setosa_x' => 3.9, 'versicolor_x' => 2.8, 'setosa' => 0.4, 'versicolor' => 1.3],
            ['setosa_x' => 3.4, 'versicolor_x' => 3.3, 'setosa' => 0.3, 'versicolor' => 1.6],
            ['setosa_x' => 3.4, 'versicolor_x' => 2.4, 'setosa' => 0.2, 'versicolor' => 1.0],
            ['setosa_x' => 2.9, 'versicolor_x' => 2.9, 'setosa' => 0.2, 'versicolor' => 1.3],
            ['setosa_x' => 3.1, 'versicolor_x' => 2.7, 'setosa' => 0.1, 'versicolor' => 1.4],
            ['setosa_x' => 3.7, 'versicolor_x' => 2.0, 'setosa' => 0.2, 'versicolor' => 1.0],
            ['setosa_x' => 3.4, 'versicolor_x' => 3.0, 'setosa' => 0.2, 'versicolor' => 1.5],
            ['setosa_x' => 3.0, 'versicolor_x' => 2.2, 'setosa' => 0.1, 'versicolor' => 1.0],
            ['setosa_x' => 3.0, 'versicolor_x' => 2.9, 'setosa' => 0.1, 'versicolor' => 1.4],
            ['setosa_x' => 4.0, 'versicolor_x' => 2.9, 'setosa' => 0.2, 'versicolor' => 1.3],
            ['setosa_x' => 4.4, 'versicolor_x' => 3.1, 'setosa' => 0.4, 'versicolor' => 1.4],
            ['setosa_x' => 3.9, 'versicolor_x' => 3.0, 'setosa' => 0.4, 'versicolor' => 1.5],
            ['setosa_x' => 3.5, 'versicolor_x' => 2.7, 'setosa' => 0.3, 'versicolor' => 1.0],
            ['setosa_x' => 3.8, 'versicolor_x' => 2.2, 'setosa' => 0.3, 'versicolor' => 1.5],
            ['setosa_x' => 3.8, 'versicolor_x' => 2.5, 'setosa' => 0.3, 'versicolor' => 1.1],
            ['setosa_x' => 3.4, 'versicolor_x' => 3.2, 'setosa' => 0.2, 'versicolor' => 1.8],
            ['setosa_x' => 3.7, 'versicolor_x' => 2.8, 'setosa' => 0.4, 'versicolor' => 1.3],
            ['setosa_x' => 3.6, 'versicolor_x' => 2.5, 'setosa' => 0.2, 'versicolor' => 1.5],
            ['setosa_x' => 3.3, 'versicolor_x' => 2.8, 'setosa' => 0.5, 'versicolor' => 1.2],
            ['setosa_x' => 3.4, 'versicolor_x' => 2.9, 'setosa' => 0.2, 'versicolor' => 1.3],
            ['setosa_x' => 3.0, 'versicolor_x' => 3.0, 'setosa' => 0.2, 'versicolor' => 1.4],
            ['setosa_x' => 3.4, 'versicolor_x' => 2.8, 'setosa' => 0.4, 'versicolor' => 1.4],
            ['setosa_x' => 3.5, 'versicolor_x' => 3.0, 'setosa' => 0.2, 'versicolor' => 1.7],
            ['setosa_x' => 3.4, 'versicolor_x' => 2.9, 'setosa' => 0.2, 'versicolor' => 1.5],
            ['setosa_x' => 3.2, 'versicolor_x' => 2.6, 'setosa' => 0.2, 'versicolor' => 1.0],
            ['setosa_x' => 3.1, 'versicolor_x' => 2.4, 'setosa' => 0.2, 'versicolor' => 1.1],
            ['setosa_x' => 3.4, 'versicolor_x' => 2.4, 'setosa' => 0.4, 'versicolor' => 1.0],
            ['setosa_x' => 4.1, 'versicolor_x' => 2.7, 'setosa' => 0.1, 'versicolor' => 1.2],
            ['setosa_x' => 4.2, 'versicolor_x' => 2.7, 'setosa' => 0.2, 'versicolor' => 1.6],
            ['setosa_x' => 3.1, 'versicolor_x' => 3.0, 'setosa' => 0.2, 'versicolor' => 1.5],
            ['setosa_x' => 3.2, 'versicolor_x' => 3.4, 'setosa' => 0.2, 'versicolor' => 1.6],
            ['setosa_x' => 3.5, 'versicolor_x' => 3.1, 'setosa' => 0.2, 'versicolor' => 1.5],
            ['setosa_x' => 3.6, 'versicolor_x' => 2.3, 'setosa' => 0.1, 'versicolor' => 1.3],
            ['setosa_x' => 3.0, 'versicolor_x' => 3.0, 'setosa' => 0.2, 'versicolor' => 1.3],
            ['setosa_x' => 3.4, 'versicolor_x' => 2.5, 'setosa' => 0.2, 'versicolor' => 1.3],
            ['setosa_x' => 3.5, 'versicolor_x' => 2.6, 'setosa' => 0.3, 'versicolor' => 1.2],
            ['setosa_x' => 2.3, 'versicolor_x' => 3.0, 'setosa' => 0.3, 'versicolor' => 1.4],
            ['setosa_x' => 3.2, 'versicolor_x' => 2.6, 'setosa' => 0.2, 'versicolor' => 1.2],
            ['setosa_x' => 3.5, 'versicolor_x' => 2.3, 'setosa' => 0.6, 'versicolor' => 1.0],
            ['setosa_x' => 3.8, 'versicolor_x' => 2.7, 'setosa' => 0.4, 'versicolor' => 1.3],
            ['setosa_x' => 3.0, 'versicolor_x' => 3.0, 'setosa' => 0.3, 'versicolor' => 1.2],
            ['setosa_x' => 3.8, 'versicolor_x' => 2.9, 'setosa' => 0.2, 'versicolor' => 1.3],
            ['setosa_x' => 3.2, 'versicolor_x' => 2.9, 'setosa' => 0.2, 'versicolor' => 1.3],
            ['setosa_x' => 3.7, 'versicolor_x' => 2.5, 'setosa' => 0.2, 'versicolor' => 1.1],
            ['setosa_x' => 3.3, 'versicolor_x' => 2.8, 'setosa' => 0.2, 'versicolor' => 1.3]
        ];
    }

    protected function fields()
    {
        return [
            Number::create("setosa_x"),
            Number::create("setosa"),
            Number::create("versicolor_x"),
            Number::create("versicolor")
        ];
    }
}
