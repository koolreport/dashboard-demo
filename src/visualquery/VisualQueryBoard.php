<?php

namespace demo\visualquery;

use \koolreport\dashboard\Dashboard;

use \koolreport\dashboard\containers\Row;
use \koolreport\dashboard\containers\Panel;
use \koolreport\dashboard\widgets\Text;

class VisualQueryBoard extends Dashboard
{
    protected function content()
    {
        return [
            Row::create([
                Panel::create()->header("<b>VisualQuery</b>")->width(1)->sub([
                    VisualQueryDemo::create()
                ]),
                ButtonDemo::create()
            ]),

            Panel::create()->type("success")->header("<b>Result Query</b>")->width(1)->sub([
                Result::create()
            ]),

            Panel::create()->type("success")->header("<b>Result Table</b>")->width(1)->sub([
                ResultTable::create()
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