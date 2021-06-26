<?php

namespace demo\toggle;

use \demo\AutoMaker;

use \koolreport\dashboard\widgets\Table;
use \koolreport\dashboard\fields\Number;
use \koolreport\dashboard\fields\Date;
use \koolreport\dashboard\fields\Badge;

class OrderTable extends Table
{
    protected function onCreated()
    {
        $this->pageSize(10);
    }


    protected function dataSource()
    {
        $query = AutoMaker::table("orders")
                ->select("orderNumber","orderDate","status");

        if($this->sibling("InProcessToggle")->value()==1) {
            return $query->where("status","In Process");
        }
        
        return $query;
    }

    protected function fields()
    {
        return [
            Number::create("orderNumber"),
            
            Date::create("orderDate")
                ->displayFormat("M j,Y"),
            
                Badge::create("status")
                ->type(function($status){
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
        ];
    }
}