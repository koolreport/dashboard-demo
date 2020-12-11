<?php

namespace demo\payments;

use \koolreport\dashboard\Dashboard;
use \koolreport\dashboard\containers\Row;
use \koolreport\dashboard\containers\Panel;
use \koolreport\dashboard\widgets\Text;

class PaymentBoard extends Dashboard
{
    protected function widgets()
    {
        return [
            Row::create()->sub([
                Row::create(),
                PaymentDateRange::create()->width(1/3),
            ]),
            Row::create()->sub([
                Panel::create()->sub([
                    PaymentByDate::create(),
                ])->width(1/2),
                Panel::create()->sub([
                    PaymentByCustomer::create()
                ])->width(1/2),    
            ]),
            PaymentTable::create()
        ];
    }
}