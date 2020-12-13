<?php

namespace demo\metrics;
use \koolreport\dashboard\metrics\Category;
use \demo\AutoMaker;
use \koolreport\dashboard\fields\Text;

class CategoryMetric extends Category
{
    protected function dataSource()
    {
        return AutoMaker::table("orders")
                ->select("status"); 
    }

    protected function fields()
    {
        return [
            $this->group(Text::create("status")),
            $this->count(Text::create("status"))
        ];
    }
}
