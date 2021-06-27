<?php

namespace demo\drilldown;

use \koolreport\dashboard\widgets\drilldown\DrillDown;
use \koolreport\dashboard\widgets\drilldown\Level;
use \koolreport\dashboard\widgets\KWidget;

use \demo\AutoMaker;

class DrillDownDemo extends DrillDown
{
    protected function onCreated() 
    {
        $this->title("The drilldown title");
    }

    protected function levels()
    {
        return [
            Level::create()
                ->title("All Years")
                ->widget(KWidget::create()
                    ->use(\koolreport\widgets\google\ColumnChart::class)
                    ->dataSource(function($params, $scope){
                        return AutoMaker::table("payments")
                                ->selectRaw("YEAR(paymentDate) as year")
                                ->sum("amount")->alias("saleAmount")
                                ->groupBy("year")->run();
                    })->columns([
                        "year"=>["type"=>"string"],
                        "saleAmount"=>[
                            "type"=>"number",
                            "prefix"=>'$'
                        ]
                    ])
                ),

            Level::create()
                ->title(function($params){
                    return "Year ".$params["year"];
                })
                ->widget(
                    KWidget::create()
                    ->use(\koolreport\widgets\google\ColumnChart::class)
                    ->dataSource(function($params, $scope) {
                        return AutoMaker::table("payments")
                                ->selectRaw("MONTH(paymentDate) as month")
                                ->sum("amount")->alias("saleAmount")
                                ->groupBy("month")
                                ->whereRaw("YEAR(paymentDate)=".$params["year"])
                                ->run();
                    })
                    ->columns([
                        "month"=>[
                            "type"=>"string",
                            "formatValue"=>function($value)
                            {
                                return date('M', mktime(0, 0, 0, $value, 10));
                            }
                        ],
                        "saleAmount"=>[
                            "type"=>"number",
                            "prefix"=>'$'
                        ]
                    ])
                )
        ];
    }
}