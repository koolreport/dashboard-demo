<?php

namespace demo\flexview;

use demo\AutoMaker;
use koolreport\dashboard\Client;
use koolreport\dashboard\fields\Currency;
use koolreport\dashboard\fields\Number;
use koolreport\dashboard\fields\Text;
use koolreport\dashboard\widgets\Table;

class CustomerTable extends Table
{
    
    protected function dataSource()
    {
        return AutoMaker::table("customers");
    }

    protected function fields()
    {
        return [
            Number::create("customerNumber"),
            Text::create("customerName"),
            Text::create("phone"),
            Text::create("country"),
            Currency::create("creditLimit")->USD()->symbol(),
        ];
    }

    protected function onCreated()
    {
        $this
        ->tableHover(true)
        ->pageSize(10);
        $this->clientRowClick(function($row){
            return 
                Client::widget($this)->action("rowSelect",[
                    "customerNumber"=>$row["customerNumber"],
                    "customerName"=>$row["customerName"],
                ]).
                Client::showLoader();
        });
    }

    protected function actionRowSelect($request, $response) {
        $this->sibling("myFlexView")->showView("orders",$request->params());
    }
}