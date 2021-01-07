<?php

namespace demo\csvsource;

use \koolreport\dashboard\Dashboard;
use \koolreport\dashboard\containers\Panel;
use \koolreport\dashboard\containers\Row;

class CSVSourceBoard extends Dashboard
{
    protected function widgets()
    {
        return [
            Row::create([
                Panel::create()->header("<b>products.csv</b>")->sub([
                    ProductTable::create()
                ])
            ])
        ];
    }
}