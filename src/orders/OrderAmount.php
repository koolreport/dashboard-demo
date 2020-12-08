<?php

namespace demo\orders;

use \koolreport\dashboard\metrics\Trend;
use \demo\AutoMaker;
use \koolreport\dashboard\fields\Date;
use \koolreport\dashboard\fields\Currency;

class OrderAmount extends Trend
{
    protected function onInit()
    {
        $this->defaultRange("This Month");
    }

    protected function dataSource()
    {
        return AutoMaker::rawSQL("
            SELECT
                orderDate,
                orderdetails.priceEach*orderdetails.quantityOrdered AS total
            FROM
                orders
            JOIN
                orderdetails
            ON
                orders.orderNumber = orderdetails.orderNumber
        ");
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
            $this->group(Date::create("orderDate")),
            $this->sum(
                Currency::create("total")
                    ->USD()
                    ->symbol()
                    ->decimals(0)
            )
        ];
    }
}