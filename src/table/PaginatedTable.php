<?php

namespace demo\table;

use \koolreport\dashboard\widgets\Table;
use \koolreport\dashboard\fields\Text;

use \demo\AutoMaker;


class PaginatedTable extends Table
{
    protected function onInit()
    {
        $this->pageSize(5);
    }

    protected function dataSource()
    {
        return AutoMaker::table("customers")
                ->select("customerName","phone");
    }

    protected function fields()
    {
        return [
            Text::create("customerName"),
            Text::create("phone"),
        ];
    }
}