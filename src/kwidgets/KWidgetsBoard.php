<?php

namespace demo\kwidgets;

use \koolreport\dashboard\Dashboard;
use \koolreport\dashboard\containers\Row;
use \koolreport\dashboard\containers\Panel;
use \koolreport\dashboard\containers\Html;

class KWidgetsBoard extends Dashboard
{
    protected function content()
    {
        return [

            Panel::create()->type("primary")->header("<b>ChartJs</b>")->sub([
                Row::create([
                    ChartJsColumnChart::create()->width(1/2),
                    ChartJsBarChart::create()->width(1/2),
                    ChartJsDonutChart::create()->width(1/2),
                    ChartJsPolarChart::create()->width(1/2),
                ])
            ]),

            Panel::create()->type("warning")->header("<b>D3</b>")->sub([
                Row::create([
                    D3BarChart::create()->width(1/2),
                    D3ColumnChart::create()->width(1/2),
                    D3Waterfall::create(),
                ])
            ]),

            Panel::create()->type("danger")->header("<b>Pivot</b>")->sub([
                PivotDemo::create(),
            ]),

            Panel::create()->type("info")->header("<b>Datatable</b>")->sub([
                DataTablesDemo::create()
            ]),

            \demo\CodeDemo::create("
                <b>What is KWidget?</b>
                <br/><br/>
                KWidget is an special wrapper for all non-native KoolReport widget.
                KoolReport's widget after wrapped with KWidget can be use like
                normal Dashboard's widget. In above, we demonstrate how to
                wrap ChartJs, D3, Pivot and Datatable with KWidget.
            ")->raw(true)
        ];
    }
}