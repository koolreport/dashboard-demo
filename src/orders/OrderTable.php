<?php

namespace demo\orders;

use \koolreport\dashboard\widgets\Table;

use \koolreport\dashboard\fields\Number;
use \koolreport\dashboard\fields\Text;
use \koolreport\dashboard\fields\Date;
use \koolreport\dashboard\fields\Badge;

use \demo\AutoMaker;

class OrderTable extends Table
{
    protected function onInit()
    {
        $this->pageSize(10);
    }
    protected function dataSource()
    {
        return AutoMaker::table("orders")
                ->join("customers","customers.customerNumber","=","orders.customerNumber")
                ->select("orders.orderNumber","customerName","orderDate","status");
    }

    protected function fields()
    {
        return [
            Number::create("orderNumber")
                ->useRaw(true),
            
            Text::create("customerName"),
            
            Date::create("orderDate")
                ->displayFormat("F j, Y")
                ->sortable(true)
                ->sort("desc")
                ,

            Badge::create("status")->type(function($status){
                switch($status){
                    case "Shipped":
                    case "Resolved":
                        return "success";
                    case "Cancelled":
                    case "Disputed":    
                        return "danger";
                    case "On Hold":
                        return "warning";
                    case "In Process":
                        return "info";
                    default:
                        return "default";
                }
            })
            ->sortable(true),
        ];
    }
}