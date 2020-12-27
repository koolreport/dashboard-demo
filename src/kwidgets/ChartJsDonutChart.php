<?php

namespace demo\kwidgets;

use \koolreport\dashboard\widgets\KWidget;

use \demo\AutoMaker;
use \koolreport\dashboard\ColorList;

class ChartJsDonutChart extends KWidget
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
        ->use(\koolreport\chartjs\DonutChart::class)
        ->settings([
            "title"=>"DonutChart",
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
