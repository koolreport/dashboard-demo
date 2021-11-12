<?php

namespace demo\admin\order;

use demo\admin\customer\Customer;
use demo\AutoMaker;
use koolreport\dashboard\admin\Resource;
use koolreport\dashboard\fields\Date;
use koolreport\dashboard\fields\ID;
use koolreport\dashboard\fields\RelationLink;

class Order extends Resource
{
    protected function onCreated()
    {
        $this->manageTable("orders")->inSource(AutoMaker::class);
    }

    protected function fields()
    {
        return [
            ID::create("orderNumber"),
            
            Date::create("orderDate"),
            
            Date::create("shippedDate"),
            
            RelationLink::create()
                ->resolveUsing(function($row){
                    return $row["orderNumber"];
                })
                ->formatUsing(function($value, $row){
                    
                })
                ->linkTo(Customer::class)
        ];
    }
}