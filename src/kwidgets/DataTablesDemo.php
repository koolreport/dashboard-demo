<?php

namespace demo\kwidgets;

use \koolreport\dashboard\widgets\KWidget;

use \demo\AutoMaker;
use \koolreport\dashboard\ColorList;

class DataTablesDemo extends KWidget
{
    protected function dataSource()
    {
        return AutoMaker::table("payments")
                ->leftJoin("customers","customers.customerNumber","=","payments.customerNumber")
                ->groupBy("payments.customerNumber")
                ->select("customers.customerName")
                ->sum("amount")->alias("total")
                ->orderBy("total","desc");
    }

    protected function onCreated()
    {
        $this
        ->use(\koolreport\datagrid\DataTables::class)
        ->settings([
            "options"=>array(
                "paging"=>true,
            )
        ]);
    }

}
