<?php

namespace demo\googlecharts;

use \koolreport\dashboard\widgets\google\GeoChart;
use \koolreport\dashboard\fields\Text;
use \koolreport\dashboard\fields\Currency;
use \koolreport\dashboard\ColorList;
use \koolreport\processes\Custom;
use  \demo\AutoMaker;

class GeoChartDemo extends GeoChart
{
    protected function onInit()
    {
        $this->title("AutoMaker's Sale Worldwide")
        ->colorScheme([])
        ->height("360px");
    }

    protected function dataSource()
    {
        return AutoMaker::rawSQL("
            SELECT 
                country,
                sum(amount) as total
            FROM
                payments
            JOIN customers ON customers.customerNumber = payments.customerNumber
            GROUP BY country
        ")
        ->run()
        ->process(Custom::process(function($row){
            if($row["country"]=="USA") {
                $row["country"] = "United States";
            }
            return $row;
        }));
    }

    protected function fields()
    {
        return [
            Text::create("country"),
            Currency::create("total")
                ->USD()->symbol()
                ->decimals(0),
        ];
    }
}