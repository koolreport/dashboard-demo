<?php

namespace demo\detailmodal;

use \koolreport\dashboard\widgets\Table;
use \koolreport\dashboard\fields\Text;
use \koolreport\dashboard\fields\Date;
use \koolreport\dashboard\fields\Badge;

use \demo\AutoMaker;

class OrderDetailsTable extends Table
{
    protected function onCreated()
    {
        $this->tableSmall(true);
    }
    protected function dataSource()
    {
        if(isset($this->params["customerNumber"])===false) {
            throw new \Exception("OrderDetailsTable requires params['customerNumber']");
        }
        
        return AutoMaker::table("orders")
                ->where("customerNumber",$this->params["customerNumber"]);
    }

    protected function fields()
    {
        return [
            Text::create("orderNumber"),
            Date::create("orderDate"),
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
            }),
            Date::create("shippedDate")
                ->formatUsing(function($value) {
                    return ($value!==null)?$this->formatValue($value):"No date";
                }),        
        ];
    }
}