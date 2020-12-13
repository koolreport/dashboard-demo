<?php

namespace demo\metrics;

use \koolreport\dashboard\metrics\Value;
use \demo\AutoMaker;
use \koolreport\dashboard\fields\Date;
use \koolreport\dashboard\fields\Text;

class ValueMetric extends Value
{

    protected function dataSource()
    {
        return AutoMaker::table("orders")
                ->select("orderDate");
    }

    protected function fields()
    {
        return [
            Date::create("orderDate"),
            $this->count(
                Text::create("orderDate")
            )
        ];
    }
}