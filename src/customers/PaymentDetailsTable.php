<?php

namespace demo\customers;

use \koolreport\dashboard\widgets\Table;
use \koolreport\dashboard\fields\Text;
use \koolreport\dashboard\fields\Date;
use \koolreport\dashboard\fields\Currency;

use \demo\AutoMaker;

class PaymentDetailsTable extends Table
{
    protected function onCreated()
    {
        $this->tableSmall(true);
    }
    protected function dataSource()
    {
        return AutoMaker::table("payments")
                ->where("customerNumber",$this->dashboard()->getCustomerNumber());
    }

    protected function fields()
    {
        return [
            Text::create("checkNumber"),
            Date::create("paymentDate"),
            Currency::create("amount")->USD()->symbol()
        ];
    }
}