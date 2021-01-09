<?php

namespace demo\customers;

use \koolreport\dashboard\Dashboard;
use \koolreport\dashboard\containers\Row;
use \koolreport\dashboard\containers\Panel;
use \koolreport\dashboard\widgets\Text;
use \koolreport\dashboard\inputs\Button;
use \koolreport\dashboard\Client;

class CustomerDetailsBoard extends Dashboard
{

    public function getCustomerNumber()
    {
        return $this->params()["customerNumber"];
    }
    public function getCustomerName()
    {
        return $this->params()["customerName"];
    }

    protected function onRendering()
    {
        $this->title($this->getCustomerName());
        return true;
    }

    protected function widgets()
    {
        return [
            Button::create()->text("Back")->onClick(function(){
                return Client::dashboard("CustomerListBoard")->load();
            }),

            Text::create()->asHtml(true)->text(function(){
                return "<h2>".$this->dashboard()->getCustomerName()."</h2>";
            }),
            
            Row::create([
                Panel::create()->header("Orders")->type("primary")->sub([
                    OrderDetailsTable::create(),
                ])->width(1/2),
                Panel::create()->header("Payments")->type("warning")->sub([
                    PaymentDetailsTable::create(),
                ])->width(1/2),
            ]),
        ];
    }
}