<?php

namespace demo\admin\order;

use \koolreport\dashboard\metrics\Category;
use \demo\AdminAutoMaker;
use \koolreport\dashboard\fields\Text;

class OrderStatus extends Category
{
    protected function onCreated()
    {
        $this->type("danger");
    }

    protected function dataSource()
    {
        return AdminAutoMaker::table("orders")
                ->select("status"); 
    }

    protected function fields()
    {
        return [
            $this->group(Text::create("status"))->showTop(3)->andShowOthers(),
            $this->count(Text::create("status"))
        ];
    }
}
