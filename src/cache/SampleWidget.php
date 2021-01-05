<?php

namespace demo\cache;

use \koolreport\dashboard\metrics\Value;
use \koolreport\dashboard\fields\Date;
use \koolreport\dashboard\fields\Text;

class SampleWidget extends Value
{

    protected function onCreated()
    {
        $this->defaultRange("This Month");
    }

    protected function dataSource()
    {
        return AutoMakerWithCache::table("orders")
                ->select("orderDate");
    }

    protected function fields()
    {
        return [
            Date::create("orderDate"),
            $this->count(
                Text::create("orderDate")
            )
        ];
    }
}