<?php

namespace demo\orders;

use \koolreport\dashboard\metrics\Value;
use \demo\AutoMaker;
use \koolreport\dashboard\fields\Date;
use \koolreport\dashboard\fields\Text;

class OrderQuantity extends Value
{
    protected function onInit()
    {
        $this->defaultRange("This Month");
    }

    protected function dataSource()
    {
        return AutoMaker::table("orders")
                ->select("orderDate");
    }

    protected function ranges()
    {
        return [
            "This Week"=>$this::thisWeek(),
            "Last 7 Days"=>$this::last7days(),
            "Last 30 Days"=>$this::last30days(),
            "This Month"=>$this::thisMonth(),
            "This Quarter"=>$this::thisQuarter(),
            "This Year"=>$this::thisYear(),
        ];
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