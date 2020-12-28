<?php

namespace demo\kwidgets;

use \koolreport\dashboard\widgets\KWidget;

use \demo\AutoMaker;
use \koolreport\dashboard\ColorList;

class D3Waterfall extends KWidget
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

    protected function onCreated()
    {
        $this
        ->use(\koolreport\d3\Waterfall::class)
        ->settings([
            "title"=>"Waterfall",
            "colorScheme"=>ColorList::random(),
            "columns"=>[
                "name",
                "amount"=>[
                    "format"=>"function(d){
                        return `\${Math.round(d / 1000)}k`;
                    }"
                ]
            ],
            "yAxis"=>[
                "prefix"=>"$",
            ],
            "summary"=>[
                "Total Revenue"=>2,
                "Profit"=>"end"
            ],
        ]);
    }

}
