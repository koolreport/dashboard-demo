<?php

namespace demo\drilldown;

use \koolreport\dashboard\widgets\drilldown\DrillDown;
use \koolreport\dashboard\widgets\drilldown\Level;
use \koolreport\dashboard\widgets\KWidget;
use \koolreport\dashboard\ColorList;

use \demo\AutoMaker;

class DrillDownDemo extends DrillDown
{
    protected function levels()
    {
        return [
            Level::create()
                ->title("All Years")
                ->widget(
                    KWidget::create()
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
                    ->settings([
                        "colorScheme"=>ColorList::random()
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
                            "formatValue"=>function($value) {
                                return date('M', mktime(0, 0, 0, $value, 10));
                            }
                        ],
                        "saleAmount"=>[
                            "type"=>"number",
                            "prefix"=>'$'
                        ]
                    ])
                    ->settings([
                        "colorScheme"=>ColorList::random()
                    ])
                ),
            Level::create()
                ->title(function($params) {
                    return date('F', mktime(0, 0, 0, $params["month"], 10));
                })
                ->widget(
                    KWidget::create()
                    ->use(\koolreport\widgets\google\ColumnChart::class)
                    ->dataSource(function($params,$scope){
                        return AutoMaker::table("payments")
                                ->max("paymentDate")->alias("thePaymentDate")
                                ->selectRaw("DAY(paymentDate) as day")
                                ->sum("amount")->alias("saleAmount")
                                ->whereRaw("YEAR(paymentDate)=".$params["year"])
                                ->whereRaw("MONTH(paymentDate)=".$params["month"])
                                ->groupBy("day")
                                ->run();
                    })
                    ->columns([
                        "day"=>[
                            "formatValue"=>function($value,$row) {
                                return date("F jS, Y",strtotime($row["thePaymentDate"]));
                            }
                        ],
                        "saleAmount"=>[
                            "type"=>"number",
                            "prefix"=>'$'
                        ]
                    ])
                    ->settings([
                        "colorScheme"=>ColorList::random()
                    ])
                )
        ];
    }
}