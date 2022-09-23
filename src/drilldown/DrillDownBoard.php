<?php

namespace demo\drilldown;

use \koolreport\dashboard\Dashboard;

use \koolreport\dashboard\containers\Row;
use \koolreport\dashboard\containers\Panel;
use \koolreport\dashboard\widgets\Text;


class DrillDownBoard extends Dashboard
{

    protected function content()
    {
        return [
            Panel::create()->header("<b>DrillDown</b>")->sub([
                DrillDownDemo::create()
            ]),

            \demo\CodeDemo::create("
                DrillDown is type of data visualization which allows us to zoom down into details.
                This is a great way to view your data from overview to details from level to level.
                DrillDown is apparently one of the most favorite tools for data exploration.
            ")->raw(true)
        ];
    }
}
