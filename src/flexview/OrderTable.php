<?php

namespace demo\flexview;

use demo\AutoMaker;
use koolreport\dashboard\Client;
use koolreport\dashboard\fields\Date;
use koolreport\dashboard\fields\Number;
use koolreport\dashboard\fields\Text;
use koolreport\dashboard\widgets\Table;

class OrderTable extends Table
{
    protected function onCreated()
    {
        $this->pageSize(10)->tableHover(true)->hidePagingOnSinglePage(true);
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
        return AutoMaker::table("orders")
                ->where("customerNumber",$this->params("customerNumber"));
    }

    protected function fields()
    {
        return [
            Number::create("orderNumber")->useRaw(true),
            Date::create("orderDate")->displayFormat("F j, Y"),
            Text::create("status"),
            Date::create("shippedDate")->displayFormat("F j, Y"),
        ];
    }
}