<?php

namespace demo\googlecharts;

use \koolreport\dashboard\Dashboard;

use \koolreport\dashboard\containers\Row;
use \koolreport\dashboard\containers\Panel;


class GoogleChartsBoard extends Dashboard
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

            Row::create([
                Panel::create()->header("LineChart")->width(1/2)->sub([
                    LineChartDemo::create()
                ]),
                Panel::create()->header("GeoChart")->width(1/2)->sub([
                    GeoChartDemo::create()
                ]),
            ]),
    ];
    }
}
