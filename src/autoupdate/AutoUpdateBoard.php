<?php

namespace demo\autoupdate;

use \koolreport\dashboard\Dashboard;
use \koolreport\dashboard\containers\Panel;

class AutoUpdateBoard extends Dashboard
{
    protected function widgets()
    {
        return [
            Panel::create()->type("primary")->header("AutoUpdate")->sub([
                RandomColumnChartDemo::create()
            ])
        ];
    }
}