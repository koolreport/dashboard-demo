<?php

namespace demo\admin\order;

use demo\admin\customer\Customer;
use koolreport\dashboard\admin\glasses\Glass;
use koolreport\dashboard\fields\Currency;
use koolreport\dashboard\fields\ID;
use koolreport\dashboard\fields\RelationLink;

class MostValuedOrders extends Glass
{
    protected function onCreated()
    {
        $this->type("success")
        ->icon("fas fa-sort-amount-up");
    }

    protected function query($query)
    {
        $query
        ->join("customers","orders.customerNumber","=","customers.customerNumber")
        ->join("orderdetails","orders.orderNumber","=","orderdetails.orderNumber")
        ->select("orders.orderNumber","customerName","orders.customerNumber")
        ->sum("quantityOrdered * priceEach")->alias("orderedAmount")
        ->groupBy("orders.orderNumber")
        ->orderBy("orderedAmount","desc");
        return $query;
    }

    protected function fields()
    {
        return [
            ID::create("orderNumber"),
            RelationLink::create("customerNumber")->label("Customer Name")
                ->formatUsing(function($value,$row){
                    return $row["customerName"];
                })
                ->linkTo(Customer::class),
            Currency::create("orderedAmount")
                ->USD()->symbol()
        ];
    }
}