<?php

namespace demo\autoupdate;

use \koolreport\dashboard\Dashboard;
use \koolreport\dashboard\containers\Panel;

class AutoUpdateBoard extends Dashboard
{
    protected function content()
    {
        return [
            Panel::create()->type("primary")->header("<b>AutoUpdate</b>")->sub([
                RandomColumnChartDemo::create()
            ]),
            \demo\CodeDemo::create("
                This example demonstrate auto-update ability of our dashboard's widget.
                This feature is great choice if you want to contruct real-time dashboard.
            ")->raw(true)
        ];
    }
}