<?php

namespace demo\drilldown;

use \koolreport\dashboard\Dashboard;

use \koolreport\dashboard\containers\Row;
use \koolreport\dashboard\containers\Panel;
use \koolreport\dashboard\widgets\Text;


class DrillDownBoard extends Dashboard
{

    protected function widgets()
    {
        return [
            Panel::create()->header("<b>DrillDown</b>")->sub([
                DrillDownDemo::create()
            ])
        ];
    }
}
