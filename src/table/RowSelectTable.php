<?php

namespace demo\table;

use demo\AutoMaker;
use koolreport\dashboard\fields\Number;
use koolreport\dashboard\fields\RowSelect;
use koolreport\dashboard\fields\Text;
use koolreport\dashboard\widgets\Table;

class RowSelectTable extends Table
{
    protected function onCreated()
    {
        $this->pageSize(5);
    }

    protected function dataSource()
    {
        return AutoMaker::table("customers")->select("customerNumber","customerName","country");
    }
    protected function fields()
    {
        return [
            RowSelect::create("customerNumber")
                ->menuOptions([
                    "All"=>RowSelect::all(),
                    "USA"=>RowSelect::where("country","=","USA")->icon("fas fa-flag-usa"),
                    "Australia"=>RowSelect::where("country","=","Australia")->icon("fa fa-wind"),
                ]),
            Number::create("customerNumber"),
            Text::create("customerName"),
            Text::create("country")
                ->sortable(true),
        ];
    }
}