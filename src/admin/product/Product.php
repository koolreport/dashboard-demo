<?php

namespace demo\admin\product;

use demo\AdminAutoMaker;
use koolreport\dashboard\admin\Resource;
use koolreport\dashboard\fields\ID;
use koolreport\dashboard\fields\Number;
use koolreport\dashboard\fields\Text;
use koolreport\dashboard\inputs\Select;

class Product extends Resource
{
    protected function onCreated()
    {
        $this->manageTable("products")->inSource(AdminAutoMaker::class);
    }

    protected function fields()
    {
        return [
            ID::create("productCode"),
            Text::create("productName"),
            Number::create("quantityInStock"),
            Text::create("productLine")
                ->inputWidget(
                    Select::create()
                    ->dataSource(function(){
                        return AdminAutoMaker::table("productlines")
                                ->select("productLine");
                    })
                    ->fields(function(){
                        return [
                            Text::create("productLine")
                        ];
                    })
                ),
        ];
    }
}