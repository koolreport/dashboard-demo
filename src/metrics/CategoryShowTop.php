<?php

namespace demo\metrics;
use \koolreport\dashboard\metrics\Category;
use \demo\AutoMaker;
use \koolreport\dashboard\fields\Text;

class CategoryShowTop extends Category
{
    protected function dataSource()
    {
        return AutoMaker::table("orders")
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
