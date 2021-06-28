<?php

namespace demo;

use \koolreport\dashboard\menu\Section;
use \koolreport\dashboard\menu\Group;
use \koolreport\dashboard\pages\Login;
use \koolreport\dashboard\User;

class App extends \koolreport\dashboard\Application
{
    protected function onCreated()
    {
        $this->debugMode(true)
        ->footerLeft("
            <a class='btn btn-primary btn-sm' target='_blank' href='https://github.com/koolreport/dashboard-demo'>
                <i class='fab fa-github'></i> SourceCode
            </a>
            <a target='_blank' href='https://www.koolreport.com/docs/dashboard/overview/' style='margin-left:5px;' class='btn btn-warning btn-sm'>
                <i class='fa fa-file-alt'></i> Docs
            </a>
            <a target='_blank' href='https://www.koolreport.com/get-koolreport-pro' style='margin-left:5px;' class='btn btn-danger btn-sm'>
                <i class='fa fa-shopping-cart'></i> Purchase
            </a>
        ")
        ->footerRight("
            <div class='d-none d-md-block d-lg-block'>Powered by <a target='_blank' href='https://www.koolreport.com'>KoolReport</a></div>
        ");
    }

    protected function login()
    {
        return  Login::create()
                ->descriptionText("
                    <i style='color:#333'>
                    Please log in with <b class='text-danger'>demo</b>/<b class='text-danger'>demo</b>
                    </i>
                ")
                ->failedText("Wrong! Please use <b>demo</b> for both username and password!")
                ->authenticate(function ($username, $password) {
                    if (strtolower($username)=="demo" && $password=="demo") {
                        return User::create()
                        ->id(1)
                        ->name("Demo")
                        ->avatar("images/8.jpg")
                        ->roles(["user"]);
                    }
                    return null;
                });
    }

    protected function dashboards()
    {
        return [
            "Home"=>home\HomeBoard::create()->icon("fa fa-home"),
            
            "AutoMaker"=>Section::create()->sub([
                "Products"=>products\ProductBoard::create()->icon("fa fa-car"),
                "Orders"=>orders\OrderBoard::create()->icon("fa fa-chart-line"),
                "Payments"=>payments\PaymentBoard::create()->icon("fa fa-hand-holding-usd"),
                "Customers"=>customers\CustomerListBoard::create()->icon("fa fa-users"),
                "CustomerDetails"=>customers\CustomerDetailsBoard::create()->hidden(true),
            ]),
            
            "Components"=>Section::create()->sub([
                "Metrics"=>metrics\MetricsBoard::create()->icon("fa fa-battery-full"),

                "Widgets"=>Group::create()->icon("far fa-chart-bar")->sub([
                    "Table"=>table\TableBoard::create()->icon("fa fa-table"),
                    "Google Charts"=>googlecharts\GoogleChartsBoard::create()->icon("fa fa-chart-pie"),
                    "D3"=>d3\D3ChartsBoard::create()->icon("fa fa-chart-pie")->badge("New"),
                    "ChartJs"=>chartjs\ChartJsBoard::create()->icon("fa fa-chart-pie")->badge("New"),
                    "DrillDown"=>drilldown\DrillDownBoard::create()->icon("fa fa-chart-pie")->badge("New"),
                    "KWidget"=>kwidgets\KWidgetsBoard::create()->icon("fas fa-gift"),
                    "AutoUpdate"=>autoupdate\AutoUpdateBoard::create()->icon("fas fa-sync"),    
                ])->badge("New"),
                
                "Containers"=>Group::create()->icon("fas fa-boxes")->sub([
                    "Modal"=>modal\ModalBoard::create()->icon("far fa-window-maximize"),
                    "Tabs"=>tabs\TabsBoard::create()->icon("fab fa-mendeley"),    
                ]),
                
                "Inputs"=>Group::create()->icon("far fa-keyboard")->sub([
                    "Inputs"=>inputs\InputsBoard::create()->icon("far fa-keyboard"),
                    "Buttons"=>buttons\ButtonBoard::create()->icon("fas fa-square"),
                    "Toggle"=>toggle\ToggleBoard::create()->icon("fas fa-toggle-off")->badge("New"),    
                ])->badge("New"),
                
                "DataSources"=>Group::create()->icon("fas fa-database")->sub([
                    "Caching"=>cache\CacheBoard::create()->icon("fas fa-bolt"),
                    "CSV Source"=>csvsource\CSVSourceBoard::create()->icon("fas fa-file-csv"),
                    "Excel Source"=>excelsource\ExcelSourceBoard::create()->icon("far fa-file-excel"),    
                ]),
            ])
        ];
    }

    

}