<?php

namespace demo;

use \koolreport\dashboard\menu\Section;

class App extends \koolreport\dashboard\Application 
{
    protected function onInit()
    {
        $this->debugMode(true);
    }
    protected function dashboards() {
        return [
            "Home"=>HomeBoard::create(),
            "AutoMaker"=>Section::create()->sub([
                "Orders"=>orders\OrderBoard::create()->icon("fa fa-chart-line"),
                "Payments"=>payments\PaymentBoard::create()->icon("fa fa-hand-holding-usd"),
                "Products"=>products\ProductBoard::create(),
            ]),
            "Components"=>Section::create()->sub([
                "Table"=>table\TableBoard::create()->icon("fa fa-table"),
                "Google Charts"=>googlecharts\GoogleChartsBoard::create()->icon("fa fa-chart-pie"),
                "Inputs"=>inputs\InputsBoard::create()->icon("fa fa-keyboard"),
                "Metrics"=>metrics\MetricsBoard::create()->icon("fa fa-battery-full"),
                "Containers"=>containers\ContainersBoard::create()->icon("fa fa-box")
            ])
        ];
    }
}