<?php

namespace demo\metrics;

use \koolreport\dashboard\metrics\Trend;
use \demo\AutoMaker;
use \koolreport\dashboard\fields\Date;
use \koolreport\dashboard\fields\Currency;

class TrendMetric extends Trend
{
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