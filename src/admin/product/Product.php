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

    /**
     * The bottom is where you can put extra widgets,
     * Here we just put the CodeDemo to show our demo code
     * which is not important in your real application.
     * @return array 
     */
    protected function bottom()
    {
        return [
            \demo\CodeDemo::create("
                Admin Panel is a new feature of Dashboard Framework which can help to contruct beautiful dashboard
                admin panel. Setting up different views of your data, applying data search & filter, adding custom
                actions on your data are all possible. 
                <p>
                    This example demonstrates creating <code>Product</code> resource to manage your products table.
                </p>
            ")->raw(true)
        ];
    }
}