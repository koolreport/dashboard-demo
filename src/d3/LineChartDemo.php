<?php

namespace demo\d3;

use \koolreport\dashboard\widgets\d3\LineChart;
use \koolreport\dashboard\fields\Text;
use \koolreport\dashboard\fields\Currency;
use \koolreport\dashboard\ColorList;

use  \demo\AutoMaker;

class LineChartDemo extends LineChart
{
    protected function onInit()
    {
        $this
        ->colorScheme(ColorList::random())
        ->height("360px");
    }

    protected function dataSource()
    {
        return AutoMaker::rawSQL("
            SELECT 
                DATE_FORMAT(paymentDate,'%b') as month,
                sum(amount) as total
            FROM
                payments
            WHERE
                YEAR(paymentDate)=2023
            GROUP BY month, DATE_FORMAT(paymentDate,'%m')
            ORDER BY DATE_FORMAT(paymentDate,'%m') asc
        ");
    }

    protected function fields()
    {
        return [
            Text::create("month"),
            Currency::create("total")
                ->USD()->symbol()
                ->decimals(0),
        ];
    }
}