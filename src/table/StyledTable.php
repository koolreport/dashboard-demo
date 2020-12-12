<?php

namespace demo\table;

use \koolreport\dashboard\widgets\Table;
use \koolreport\dashboard\fields\Text;

use \demo\AutoMaker;


class StyledTable extends Table
{
    protected function onInit()
    {
        $this
        ->tableHover(true)
        ->tableOutline(true)
        ->tableStriped(true)
        ->tableSmall(true)
        ->tableBordered(true)
        ->headerDark(false);
    }

    protected function dataSource()
    {
        return AutoMaker::table("customers")
                ->select("customerName","phone")
                ->limit(5);
    }

    protected function fields()
    {
        return [
            Text::create("customerName"),
            Text::create("phone"),
        ];
    }
}