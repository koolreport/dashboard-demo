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
            Row::create()->sub([
                OrderQuantity::create()->type("primary")->width(1/3)->lazyLoading(true),
                OrderAmount::create()->type("warning")->width(1/3)->lazyLoading(true),
                OrderStatus::create()->type("success")->width(1/3)->lazyLoading(true),    
            ]),
            OrderTable::create()->lazyLoading(true)
        ];
    }    
}