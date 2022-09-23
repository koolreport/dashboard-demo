<?php

namespace demo\googlecharts;

use \koolreport\dashboard\Dashboard;

use \koolreport\dashboard\containers\Row;
use \koolreport\dashboard\containers\Panel;
use \koolreport\dashboard\widgets\Text;

class GoogleChartsBoard extends Dashboard
{
    protected function content()
    {
        return [
            Row::create([
                Panel::create()->header("<b>ColumnChart</b>")->width(1/2)->sub([
                    ColumnChartDemo::create()
                ]),
                Panel::create()->header("<b>BarChart</b>")->width(1/2)->sub([
                    BarChartDemo::create()
                ]),
            ]),
            Row::create([
                Panel::create()->header("<b>PieChart</b>")->width(1/2)->sub([
                    PieChartDemo::create()
                ]),
                Panel::create()->header("<b>DonutChart</b>")->width(1/2)->sub([
                    DonutChartDemo::create()
                ]),
            ]),

            Row::create([
                Panel::create()->header("<b>LineChart</b>")->width(1/2)->sub([
                    LineChartDemo::create()
                ]),
                Panel::create()->header("<b>GeoChart (AutoMaker's Sale Worldwide)</b>")->width(1/2)->sub([
                    GeoChartDemo::create()
                ]),
            ]),

            \demo\CodeDemo::create("
                Google Charts is an amazing visualization library that is integrated with KoolReport in general
                and Dashboard specifically. Google Charts contains over 30 types of charts which are more than
                enough for us to present our data in an impressive way. In this example, we demonstrates 6 
                most used types of charts: ColumnChart, BarChart, PieChart, DonutChart, LineChart and special
                GeoChart map.
                <br/><br/>
                All charts are fully bound with data which acts as truly working example for you to get started.
            ")->raw(true)
    ];
    }
}