<?php

namespace demo\d3;

use \koolreport\dashboard\Dashboard;

use \koolreport\dashboard\containers\Row;
use \koolreport\dashboard\containers\Panel;
use \koolreport\dashboard\widgets\Text;

class D3ChartsBoard extends Dashboard
{
    protected function widgets()
    {
        return [
            Row::create([
                Panel::create()->header("ColumnChart")->width(1/2)->sub([
                    ColumnChartDemo::create()
                ]),
                Panel::create()->header("BarChart")->width(1/2)->sub([
                    BarChartDemo::create()
                ]),
            ]),
            Row::create([
                Panel::create()->header("PieChart")->width(1/2)->sub([
                    PieChartDemo::create()
                ]),
                Panel::create()->header("DonutChart")->width(1/2)->sub([
                    DonutChartDemo::create()
                ]),
            ]),

            Panel::create()->header("LineChart")->width(1/2)->sub([
                LineChartDemo::create()
            ]),
            Panel::create()->header("GeoChart (AutoMaker's Sale Worldwide)")->width(1/2)->sub([
                WaterfallDemo::create()
            ]),
    ];
    }
}