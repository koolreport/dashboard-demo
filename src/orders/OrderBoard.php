<?php

namespace demo\orders;

use \koolreport\dashboard\Dashboard;
use \koolreport\dashboard\containers\Row;
use \koolreport\dashboard\containers\Panel;
use \koolreport\dashboard\containers\Html;

class OrderBoard extends Dashboard
{
    protected function content()
    {
        return [
            Row::create()->sub([
                OrderQuantity::create()->type("primary")->width(1/3)->lazyLoading(true),
                OrderAmount::create()->type("warning")->width(1/3)->lazyLoading(true),
                OrderStatus::create()->type("success")->width(1/3)->lazyLoading(true),    
            ]),
            OrderTable::create()->lazyLoading(true),
            
            \demo\CodeDemo::create("
                This example shows the status of ordering. By using metrics widget, it shows the status of
                order quantity, order amount as well as the distribution of order status. It will help us
                to have an overview of business. The table in example shows the list of all orders 
                with their full information. We can navigate the orders page by page, 
                sorting them by their status or order date.             
            ")
        ];
    }    
}