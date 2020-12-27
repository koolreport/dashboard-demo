<?php

namespace demo;

use \koolreport\dashboard\menu\Section;
use \koolreport\dashboard\pages\Login;
use \koolreport\dashboard\User;

class App extends \koolreport\dashboard\Application
{
    protected function onInit()
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
        ");
    }

    protected function login()
    {
        return  Login::create()
                ->headerText("Dashboard Demo")
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
            ]),
            "Components"=>Section::create()->sub([
                "Table"=>table\TableBoard::create()->icon("fa fa-table"),
                "Google Charts"=>googlecharts\GoogleChartsBoard::create()->icon("fa fa-chart-pie"),
                "Inputs"=>inputs\InputsBoard::create()->icon("fa fa-keyboard"),
                "Metrics"=>metrics\MetricsBoard::create()->icon("fa fa-battery-full"),
                "Buttons"=>buttons\ButtonBoard::create()->icon("fas fa-square"),
                "Modal"=>modal\ModalBoard::create()->icon("far fa-window-maximize"),
                "Tabs"=>tabs\TabsBoard::create()->icon("fab fa-mendeley"),
                "KWidgets"=>kwidgets\KWidgetsBoard::create()->icon("fab fa-mendeley"),

            ])
        ];
    }
}
