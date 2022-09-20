<?php

namespace demo\flexview;

use demo\AutoMaker;
use koolreport\dashboard\Client;
use koolreport\dashboard\widgets\Table;

class OrderTable extends Table
{
    protected function onCreated()
    {
        $this->pageSize(10)->tableHover(true);
        $this->clientRowClick(function($row){
            return 
                Client::widget($this)->action("rowSelect",array_merge([
                    "orderNumber"=>$row["orderNumber"],
                ],$this->params())).
                Client::showLoader();
        });
    }

    protected function actionRowSelect($request, $response)
    {
        $this->sibling("myFlexView")->showView("orderdetails",$request->params());
    }

    protected function dataSource()
    {
        return AutoMaker::table("orders")->where("customerNumber",$this->params("customerNumber"));
    }
}