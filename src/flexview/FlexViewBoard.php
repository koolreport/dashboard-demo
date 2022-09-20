<?php

namespace demo\flexview;

use koolreport\dashboard\containers\Html;
use koolreport\dashboard\containers\Panel;
use koolreport\dashboard\containers\Row;
use koolreport\dashboard\Dashboard;
use koolreport\dashboard\inputs\Button;
use koolreport\dashboard\Lang;
use koolreport\dashboard\widgets\FlexView;

class FlexViewBoard extends Dashboard
{
    protected function content()
    {
        return [
            Panel::create()->type("primary")->header(Html::h5("Flexview - Turn flex view into a drilldown"))->sub([
                FlexView::create("myFlexView")
                ->viewOptions([
                    "customers"=>function($params) {
                        return [
                            Row::create([
                                Html::h3("Customers")
                            ]),
                            CustomerTable::create()
                        ];
                    },
                    "orders"=>function($params) {
                        //Params contain "customerNumber" and "customerName"
                        $customerNumber = $params["customerNumber"];
                        $customerName = $params["customerName"];
                        return [
                            Row::create([
                                Html::h3("Orders of $customerName(#$customerNumber)"),
                                Html::div()->class("text-right")->sub([
                                    Button::create("backButton")
                                    ->text(Lang::t("Back"))
                                    ->action("submit",function($request, $response){
                                        $this->sibling("myFlexView")->showView("customers");
                                    }),
                                ]) 
                            ]),
                            OrderTable::create()->params($params)
                        ];
                    },
                    "orderdetails"=>function($params) {
                        $orderNumber = $params["orderNumber"];
                        $customerName = $params["customerName"];
                        return [
                            Row::create([
                                Html::h3("Detail of order #$orderNumber of $customerName"),
                                Html::div()->class("text-right")->sub([
                                    Button::create("backButtonOrderDetail")
                                    ->text(Lang::t("Back"))
                                    ->action("submit",function($request, $response) use ($params){
                                        $this->sibling("myFlexView")->showView("orders",$params);
                                    }),
                                ]) 
                            ]),
                            OrderDetailTable::create()->params($params)
                        ];
                    }
                ])
                ->initialView("customers")
            ]),
            \demo\CodeDemo::create("
                    The example show you how to use FlexView to create a simple drilldown. By clicking to row of table, you will go to details
                    of sub table.
            ")->raw(true)
        ];
    }
}