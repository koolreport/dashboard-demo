<?php

namespace demo\flexview;

use demo\AutoMaker;
use koolreport\dashboard\widgets\Table;

class OrderDetailTable extends Table
{
    protected function onCreated()
    {
        $this->pageSize(10);
    }
    protected function dataSource()
    {
        return AutoMaker::table("orderdetails")->where("orderNumber",$this->params("orderNumber"));
    }
}