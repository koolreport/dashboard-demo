<?php

namespace demo\tabs;

use \koolreport\dashboard\Dashboard;

use \koolreport\dashboard\containers\Row;
use \koolreport\dashboard\containers\Panel;
use \koolreport\dashboard\containers\Tabs;


class TabsBoard extends Dashboard
{
    protected function content()
    {
        return [
            Tabs::create()
                ->addTab("<i class='fa fa-chart-line'></i> Revenue 2022",[
                    \demo\googlecharts\LineChartDemo::create()
                ])
                ->addTab("<i class='fa fa-chart-bar'></i> Top paid customers",[
                    \demo\googlecharts\ColumnChartDemo::create()
                    ->height("360px")
                ])
                ->addTab("<i class='fas fa-globe'></i> Worldwide Sales",[
                    \demo\googlecharts\GeoChartDemo::create()
                ])
        ];
    }
}