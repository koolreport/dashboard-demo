<?php

namespace demo\admin\order;

use demo\admin\product\Product;
use demo\AdminAutoMaker;
use koolreport\dashboard\admin\Resource;
use koolreport\dashboard\fields\Currency;
use koolreport\dashboard\fields\ID;
use koolreport\dashboard\fields\Number;
use koolreport\dashboard\fields\RelationLink;

class OrderDetail extends Resource
{
    protected function onCreated()
    {
        $this->manageTable("orderdetails")->inSource(AdminAutoMaker::class);
        $this->listScreen()->relationTable()
            ->rowActionsField(null)
            ->showFooter(true);
        
    }

    protected function query($query)
    {
        $query->join("products","orderdetails.productCode","=","products.productCode")
            ->select("productName")
            ->select("orderdetails.orderNumber","orderdetails.productCode")
            ->select("quantityOrdered","priceEach")
            ->select("quantityOrdered * priceEach")->alias("total");
        return $query;
    }

    protected function fields()
    {
        return [
            ID::create("orderNumber"),
            RelationLink::create("productCode")->label("Product")
                ->formatUsing(function($value, $row){
                    return $row["productName"];
                })
                ->linkTo(Product::class),
            Number::create("quantityOrdered"),
            Currency::create("priceEach")->USD()->symbol(),
            Currency::create("total")->USD()->symbol()->footer("sum"),
        ];
    }
}