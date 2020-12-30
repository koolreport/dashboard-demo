<?php

namespace demo\cache;

use \koolreport\dashboard\metrics\Value;
use \koolreport\dashboard\fields\Date;
use \koolreport\dashboard\fields\Text;

class SampleWidget extends Value
{

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