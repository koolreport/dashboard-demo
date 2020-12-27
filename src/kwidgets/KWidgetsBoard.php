<?php

namespace demo\kwidgets;

use \koolreport\dashboard\Dashboard;
use \koolreport\dashboard\containers\Row;
use \koolreport\dashboard\containers\Panel;

class KWidgetsBoard extends Dashboard
{
    protected function widgets()
    {
        return [
            Panel::create()->header("ChartJS Wrapper")->width(1/2)->sub([
                Row::create([
                    ChartJsColumnChart::create()->width(1/2),
                    ChartJsBarChart::create()->width(1/2),
                    ChartJsDonutChart::create()->width(1/2),
                    ChartJsPolarChart::create()->width(1/2),
                ])
            ]),
            Panel::create()->header("D3 Chart Wrapper")->sub([
                Row::create([
                    D3BarChart::create()->width(1/2),
                    D3ColumnChart::create()->width(1/2),
                    D3Waterfall::create(),
                ])
            ]),

            Panel::create()->header("Pivot Wrapper")->sub([

            ]),
            Panel::create()->header("DataTables Wrapper")->sub([
                DataTablesDemo::create()
            ])->width(1/2),
        ];
    }
}