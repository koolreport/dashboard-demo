<?php

namespace demo\admin\order;

use \koolreport\dashboard\metrics\Value;
use \demo\AdminAutoMaker;
use \koolreport\dashboard\fields\Date;
use \koolreport\dashboard\fields\Text;

class OrderQuantity extends Value
{
    protected function onInit()
    {
        $this
        ->type("primary")
        ->defaultRange("This Month");
    }

    protected function dataSource()
    {
        return AdminAutoMaker::table("orders")
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