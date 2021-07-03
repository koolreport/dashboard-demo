<?php

namespace demo\kwidgets;

use \koolreport\dashboard\Dashboard;
use \koolreport\dashboard\containers\Row;
use \koolreport\dashboard\containers\Panel;
use \koolreport\dashboard\containers\Html;

class KWidgetsBoard extends Dashboard
{
    protected function widgets()
    {
        return [
            Panel::create()->type("secondary")->header("<b>What is KWidget?</b>")->sub([
                Html::p("
                    KWidget is an special wrapper for all non-native KoolReport widget.
                    KoolReport's widget after wrapped with KWidget can be use like
                    normal Dashboard's widget. In below, we demonstrate how to
                    wrap ChartJs, D3, Pivot and Datatable with KWidget.
                ")
            ]),
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

            Panel::create()->type("danger")->header("<b>PivotTable</b>")->sub([
                PivotDemo::create()
            ]),
            Panel::create()->type("info")->header("<b>Datatable</b>")->sub([
                DataTablesDemo::create()
            ])->width(1/2),
        ];
    }
}