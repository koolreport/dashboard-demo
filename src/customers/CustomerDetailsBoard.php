<?php

namespace demo\customers;

use \koolreport\dashboard\Dashboard;
use \koolreport\dashboard\containers\Row;
use \koolreport\dashboard\containers\Panel;
use \koolreport\dashboard\widgets\Text;
use \koolreport\dashboard\containers\Html;
use \koolreport\dashboard\inputs\Button;
use \koolreport\dashboard\Client;

use \demo\AutoMaker;

class CustomerDetailsBoard extends Dashboard
{
    protected $customerName;

    public function getCustomerNumber()
    {
        return $this->params("customerNumber");
    }

    protected function content()
    {
        $this->customerName = AutoMaker::table("customers")
                        ->where("customerNumber",$this->getCustomerNumber())
                        ->select("customerName")
                        ->run()
                        ->getScalar();
        return [
            Button::create()->text("Back")->onClick(function(){
                return Client::dashboard("CustomerListBoard")->load();
            }),
            Html::h2($this->customerName),
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

    protected function onRendering()
    {
        $this->title($this->customerName);
        return true;
    }
}