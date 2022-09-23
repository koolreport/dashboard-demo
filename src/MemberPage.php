<?php

namespace demo;

use koolreport\dashboard\pages\Main;

class MemberPage extends Main
{
    protected function onCreated()
    {
        $this->loginRequired(true); //Require login to view content of page
    }
    protected function sidebar()
    {
        return [
            "Customers"=>admin\customer\Customer::create()->icon("fas fa-users")->badge("NEW"),
            "Orders"=>admin\order\Order::create()->icon("far fa-copy")->badge("NEW"),
            "Products"=>admin\product\Product::create()->icon("fas fa-car")->badge("NEW"),
        ];
    }
}
