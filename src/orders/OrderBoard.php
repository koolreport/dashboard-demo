<?php

namespace demo\orders;

use \koolreport\dashboard\Dashboard;
use \koolreport\dashboard\containers\Row;
use \koolreport\dashboard\containers\Panel;
use \koolreport\dashboard\widgets\Text;

class OrderBoard extends Dashboard
{
    protected function widgets()
    {
        return [
            Text::create("<h1>Orders</h1>")->asHtml(true),
            Row::create()->sub([
                OrderQuantity::create()->type("primary"),
                OrderAmount::create()->type("warning"),
                OrderStatus::create()->type("success")    
            ]),
            OrderTable::create()
        ];
    }    
}