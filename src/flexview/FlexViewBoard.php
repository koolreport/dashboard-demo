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
            FlexView::create("myFlexView")
            ->viewOptions([
                "customers"=>function($params) {
                    return [
                        Row::create([
                            Html::h3("Customers")
                        ]),
                        Panel::create()->sub([
                            Html::p(Html::i("*Note: Click to row to view orders of a customer")),
                            CustomerTable::create()
                        ])
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
                                Button::create("ordersBackButton")
                                ->text(Lang::t("Back"))
                                ->action("submit",function($request, $response){
                                    $this->sibling("myFlexView")->historyBack();
                                }),
                            ]) 
                        ]),
                        Panel::create()->sub([
                            Html::p(Html::i("*Note: Click to row to view details of an order")),
                            OrderTable::create()->params($params)
                        ])
                    ];
                },
                "orderdetails"=>function($params) {
                    $orderNumber = $params["orderNumber"];
                    $customerName = $params["customerName"];
                    return [
                        Row::create([
                            Html::h3("Detail of order #$orderNumber of $customerName"),
                            Html::div()->class("text-right")->sub([
                                Button::create("orderDetailsBackButton")
                                ->text(Lang::t("Back"))
                                ->action("submit",function($request, $response){
                                    $this->sibling("myFlexView")->historyBack();
                                }),
                            ]) 
                        ]),
                        Panel::create()->sub([
                            Html::p(Html::i("*Note: Click back button to go back to previous table")),
                            OrderDetailTable::create()->params($params)
                        ])
                    ];
                }
            ])
            ->initialView("customers")
            ->updateEffect("none"),

            \demo\CodeDemo::create("
                    The example show you how to use FlexView to create a simple drilldown. By clicking to row of table, you will go to details
                    of sub table.
            ")->raw(true)
        ];
    }
}