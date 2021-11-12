<?php

namespace demo\admin\order;

use demo\admin\customer\Customer;
use demo\AutoMaker;
use koolreport\dashboard\admin\Resource;
use koolreport\dashboard\fields\Date;
use koolreport\dashboard\fields\ID;
use koolreport\dashboard\fields\Number;
use koolreport\dashboard\fields\RelationLink;
use koolreport\dashboard\fields\Text;
use koolreport\dashboard\inputs\Select;

class Order extends Resource
{
    protected function onCreated()
    {
        $this->manageTable("orders")->inSource(AutoMaker::class);
    }

    protected function query($query)
    {
        $query->leftJoin("customers","orders.customerNumber","=","customers.customerNumber")
            ->select("orderNumber","orderDate","shippedDate","orders.customerNumber","customerName");
        return $query;
    }

    protected function fields()
    {
        return [
            ID::create("orderNumber"),

            RelationLink::create("customerNumber")
                ->label("Customer")
                ->formatUsing(function($value,$row){
                    return $row["customerName"];
                })
                ->linkTo(Customer::class)
                ->inputWidget(
                    Select::create()
                    ->dataSource(function(){
                        return AutoMaker::table("customers")
                                ->select("customerNumber","customerName");
                    })
                    ->fields(function(){
                        return [
                            Number::create("customerNumber"),
                            Text::create("customerName"),
                        ];
                    })
                ),
            
            Date::create("orderDate")
                ->displayFormat("F j, Y"),
            
            Date::create("shippedDate")
                ->displayFormat("F j, Y"),
            
        ];
    }
}