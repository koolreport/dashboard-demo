<?php

namespace demo\googlecharts;

use \koolreport\dashboard\widgets\google\LineChart;
use \koolreport\dashboard\fields\Text;
use \koolreport\dashboard\fields\Currency;
use \koolreport\dashboard\ColorList;

use  \demo\AutoMaker;

class LineChartDemo extends LineChart
{
    protected function onInit()
    {
        $this->title("AutoMaker's Revenue in 2019")
        ->colorScheme(ColorList::random())
        ->height("360px");
    }

    protected function dataSource()
    {
        return AutoMaker::rawSQL("
            SELECT 
                monthNumeric, 
                month,
                sum(amount) as total
            FROM 
                (SELECT
                    DATE_FORMAT(paymentDate,'%m') as monthNumeric, 
                    DATE_FORMAT(paymentDate,'%b') as month,
                    amount
                FROM
                    payments
                WHERE
                YEAR(paymentDate)=2019) t
            GROUP BY month
            ORDER BY monthNumeric
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