<?php

namespace demo\kwidgets;

use \koolreport\dashboard\widgets\KWidget;

use \demo\AutoMaker;
use \koolreport\dashboard\ColorList;

class ChartJsColumnChart extends KWidget
{
    protected function dataSource()
    {
        return AutoMaker::table("payments")
                ->leftJoin("customers","customers.customerNumber","=","payments.customerNumber")
                ->groupBy("payments.customerNumber")
                ->select("customers.customerName")
                ->sum("amount")->alias("total")
                ->orderBy("total","desc")
                ->limit(5);
    }

    protected function onCreated()
    {
        $this
        ->use(\koolreport\chartjs\ColumnChart::class)
        ->settings([
            "title"=>"ColumnChart",
            "colorScheme"=>ColorList::random(),
            "columns"=>array(
                "customerName"=>[
                    "label"=>"Customer"
                ],
                "total"=>[
                    "label"=>"Total",
                    "prefix"=>"$",
                ]
            )
        ]);
    }

}
