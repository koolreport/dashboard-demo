<?php

namespace demo\admin\order;

use demo\admin\customer\Customer;
use demo\AutoMaker;
use koolreport\dashboard\admin\relations\HasMany;
use koolreport\dashboard\admin\Resource;
use koolreport\dashboard\fields\Badge;
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
            ->select("orderNumber","orderDate","shippedDate","status")
            ->select("customerName")
            ->select("orders.customerNumber");
        return $query;
    }

    protected function relations()
    {
        return [
            HasMany::resource(OrderDetail::class)
                ->link(["orderNumber"=>"orderNumber"])
        ];
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
                ->sortable(true)
                ->inputWidget(
                    Select::create()
                    ->dataSource(function(){
                        return AutoMaker::table("orders")->select("status")->distinct();
                    })
                    ->fields(function(){
                        return [
                            Text::create("status")
                        ];
                    })
                )
            
        ];
    }
}