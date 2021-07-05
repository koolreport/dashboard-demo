<?php

namespace demo\pivot;

use \koolreport\dashboard\Dashboard;
use \koolreport\dashboard\containers\Row;
use \koolreport\dashboard\containers\Panel;
use \koolreport\dashboard\widgets\Text;

class PivotBoard extends Dashboard
{
    protected function widgets()
    {
        return [
            Panel::create()->type("secondary")->header("<b>What is Pivot widgets?</b>")->sub([
                Text::create()
                ->text("
                    Pivot widgets include PivotTable and PivotMatrix. PivotTable is a fixed displaying widget for pivot data while PivotMatrix is a dynamic widget which allows users to drag and drop pivot fields, do sorting, etc.
                ")
            ]),

            Panel::create()->type("danger")->header("<b>PivotTable</b>")->sub([
                CustomersPivotTable::create(),
            ]),

            Panel::create()->type("danger")->header("<b>PivotMatrix</b>")->sub([
                // PivotDemo::create(),
                CustomersPivotMatrix::create(),
            ]),

        ];
    }
}