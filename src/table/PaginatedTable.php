<?php

namespace demo\table;

use \koolreport\dashboard\widgets\Table;
use \koolreport\dashboard\fields\Text;

use \demo\AutoMaker;


class PaginatedTable extends Table
{
    protected function onCreated()
    {
        //Make default page size with 5 rows and allow users to change pagesize
        $this
            ->pageSize(5)
            ->pageSizeOptions([5,10,20]);
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