<?php

namespace demo\products;

use \koolreport\dashboard\widgets\Table;
use \demo\AutoMaker;

use \koolreport\dashboard\fields\Text;
use \koolreport\dashboard\fields\Number;
use \koolreport\dashboard\fields\Currency;
use \koolreport\dashboard\containers\Html;

class ProductTable extends Table
{
    protected function onInit()
    {
        $this->pageSize(10);
    }

    protected function onExporting($params)
    {
        //Remove table paging when exporting to PDF
        $this->pageSize(null);
        return true;
    }

    public function exportedView()
    {
        return  Html::div()->class("text-center")->sub([
                    Html::h1($this->sibling("ProductByLine")->selectedProductLine())
                ]).$this->view();
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
