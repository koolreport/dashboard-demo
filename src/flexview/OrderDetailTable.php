<?php

namespace demo\flexview;

use demo\AutoMaker;
use koolreport\dashboard\fields\Currency;
use koolreport\dashboard\fields\Number;
use koolreport\dashboard\fields\Text;
use koolreport\dashboard\widgets\Table;

class OrderDetailTable extends Table
{
    protected function onCreated()
    {
        $this->pageSize(10)->hidePagingOnSinglePage(true);
    }
    protected function dataSource()
    {
        return AutoMaker::table("orderdetails")
            ->where("orderNumber",$this->params("orderNumber"));
    }

    protected function fields()
    {
        return [
            Text::create("productCode"),
            Number::create("quantityOrdered"),
            Currency::create("priceEach")->USD()->symbol(),    
        ];
    }
}