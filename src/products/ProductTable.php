<?php

namespace demo\products;

use \koolreport\dashboard\widgets\Table;
use \demo\AutoMaker;

use \koolreport\dashboard\fields\Text;
use \koolreport\dashboard\fields\Number;
use \koolreport\dashboard\fields\Currency;


class ProductTable extends Table
{
    protected function onInit()
    {
        $this->pageSize(10);
    }

    protected function dataSource()
    {
        return AutoMaker::table("products")
                ->where("productLine",$this->sibling("ProductByLine")->selectedProductLine())
                ->select("productName","productVendor","quantityInStock","buyPrice");
    }

    protected function fields()
    {
        return [
            Text::create("productName"),
            Text::create("productVendor"),
            Number::create("quantityInStock"),
            Currency::create("buyPrice")->USD()->symbol()
        ];
    }

}
