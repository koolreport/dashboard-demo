<?php

namespace demo\d3;

use \koolreport\dashboard\widgets\d3\Waterfall;
use \koolreport\dashboard\ColorList;
use \koolreport\processes\Custom;
use  \demo\AutoMaker;

class WaterfallDemo extends Waterfall
{
    protected function dataSource()
    {
        return [
            ["name"=>"Product Revenue","amount"=>420000],
            ["name"=>"Services Revenue","amount"=>210000],
            ["name"=>"Fixed Costs","amount"=>-170000],
            ["name"=>"Variable Costs","amount"=>-140000],
        ];
    }

    protected function onInit()
    {
        $this
        ->title("Cashflow")
        ->columns([
            "name",
            "amount"=>[
                "format"=>"function(d){
                    return `\${Math.round(d / 1000)}k`;
                }"
            ]
        ])
        ->summary([
            "Total Revenue"=>2,
            "Profit"=>"end",
        ])
        ->height("360px");
    }
}