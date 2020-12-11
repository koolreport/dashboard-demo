<?php

namespace demo\table;

use \koolreport\dashboard\widgets\Table;
use \koolreport\dashboard\fields\Text;

use \demo\AutoMaker;


class ColumnAlignTable extends Table
{
    protected function dataSource()
    {
        return AutoMaker::table("customers")
                ->select("customerName","phone")
                ->limit(5)
                ->run();
    }

    protected function fields()
    {
        return [
            Text::create("customerName")->label("Center Align")
                ->textAlign("center"),
            Text::create("phone")->label("Right Align")
                ->textAlign("right"),
        ];
    }
}