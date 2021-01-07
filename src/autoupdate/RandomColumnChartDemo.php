<?php

namespace demo\autoupdate;

use \koolreport\dashboard\widgets\google\ColumnChart;

class RandomColumnChartDemo extends ColumnChart
{
    protected function onCreated()
    {
        $this->title("Chart is auto-updated in 5 seconds")
            ->autoUpdate("5secs");
    }

    protected function dataSource()
    {
        return [
            ["category"=>"Phones","amount"=>rand(50,100)],
            ["category"=>"Computers","amount"=>rand(20,60)],
            ["category"=>"Tablets","amount"=>rand(70,140)],
            ["category"=>"Accessories","amount"=>rand(30,120)]
        ];
    }
}