<?php

namespace demo\payments;

use \koolreport\dashboard\Dashboard;
use \koolreport\dashboard\containers\Row;
use \koolreport\dashboard\containers\Panel;

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
                ]),
                Panel::create()->sub([
                    PaymentByCustomer::create()
                ]),    
            ]),
            PaymentTable::create()
        ];
    }
}