<?php

namespace demo\orders;

use \koolreport\dashboard\Dashboard;
use \koolreport\dashboard\containers\Row;
use \koolreport\dashboard\containers\Panel;
class OrderBoard extends Dashboard
{
    protected function widgets()
    {
        return [
            Row::create()->sub([
                OrderQuantity::create()->type("primary"),
                OrderAmount::create()->type("warning"),
                OrderStatus::create()->type("success")    
            ]),
            OrderTable::create()
        ];
    }    
}