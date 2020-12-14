<?php

namespace demo;

use \koolreport\dashboard\menu\Section;

class App extends \koolreport\dashboard\Application 
{
    protected function onInit()
    {
        $this->debugMode(true)
        ->footerLeft("
            <a class='btn btn-primary btn-sm' target='_blank' href='https://github.com/koolreport/dashboard-demo'>
                <i class='fa fa-code'></i> SourceCode
            </a>
            <a target='_blank' href='https://www.koolreport.com/docs/dashboard/overview/' style='margin-left:5px;' class='btn btn-warning btn-sm'>
                <i class='fa fa-file-alt'></i> Docs
            </a>
            <a target='_blank' href='https://www.koolreport.com/get-koolreport-pro' style='margin-left:5px;' class='btn btn-danger btn-sm'>
                <i class='fa fa-shopping-cart'></i> Purchase
            </a>
        ");
    }
    protected function dashboards() {
        return [
            "Home"=>home\HomeBoard::create(),
            "AutoMaker"=>Section::create()->sub([
                "Products"=>products\ProductBoard::create()->icon("fa fa-car"),
                "Orders"=>orders\OrderBoard::create()->icon("fa fa-chart-line"),
                "Payments"=>payments\PaymentBoard::create()->icon("fa fa-hand-holding-usd"),
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