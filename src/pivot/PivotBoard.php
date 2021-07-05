<?php

namespace demo\pivot;

use \koolreport\dashboard\Dashboard;

use \koolreport\dashboard\containers\Row;
use \koolreport\dashboard\containers\Panel;
use \koolreport\dashboard\containers\Html;

class PivotBoard extends Dashboard
{
    protected function widgets()
    {
        return [
            Html::h1("Pivot")
        ];
    }
}