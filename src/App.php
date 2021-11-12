<?php

namespace demo;

use \koolreport\dashboard\menu\Section;
use \koolreport\dashboard\menu\Group;
use \koolreport\dashboard\pages\Login;
use \koolreport\dashboard\User;

use \koolreport\dashboard\menu\MenuItem;
use \koolreport\dashboard\Client;
use \koolreport\dashboard\ExportHandler;
use \koolreport\dashboard\export\ChromeHeadlessio;

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
        ")
        ->js("//cdnjs.cloudflare.com/ajax/libs/highlight.js/11.0.1/highlight.min.js")
        ->css("https://cdn.koolreport.com/examples/assets/theme/tomorrow.css");
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

                    //Look for user that have username and password 
                    $users = AutoMaker::table("users")
                                ->where("username",$username)
                                ->where("password",$password)
                                ->run();
                                
                    $user = $users->get(0);//Try to get first user, get associate array contain user information

                    if($user!==null) {
                        //Found a user, return User object
                        return User::create()
                        ->id($user["id"])
                        ->name($user["displayname"])
                        ->avatar("images/8.jpg")
                        ->roles([$user["role"]]);                        
                    }

                    //Other: fail to login, return null
                    return null;
                });
    }

    protected function dashboards()
    {
        return [
            "Home"=>home\HomeBoard::create()->icon("fa fa-home"),
            
            "KPI Dashboard"=>Section::create()->sub([
                "Products"=>products\ProductBoard::create()->icon("fa fa-car")->badge("New"),
                "Orders"=>orders\OrderBoard::create()->icon("fa fa-chart-line"),
                "Payments"=>payments\PaymentBoard::create()->icon("fa fa-hand-holding-usd"),
                "Customers"=>customers\CustomerListBoard::create()->icon("fa fa-users")->badge("New"),
                "CustomerDetails"=>customers\CustomerDetailsBoard::create()->hidden(true),
            ]),
            
            "Components"=>Section::create()->sub([
                "Metrics"=>metrics\MetricsBoard::create()->icon("fa fa-battery-full"),
                "Custom Board"=>customboard\DemoCustomBoard::create()->icon("far fa-edit")->badge("New"),

                "Widgets"=>Group::create()->icon("far fa-chart-bar")->sub([
                    "Table"=>table\TableBoard::create()->icon("fa fa-table"),
                    "Google Charts"=>googlecharts\GoogleChartsBoard::create()->icon("fa fa-chart-line"),
                    "D3"=>d3\D3ChartsBoard::create()->icon("fa fa-chart-area")->badge("New"),
                    "ChartJs"=>chartjs\ChartJsBoard::create()->icon("fa fa-chart-bar")->badge("New"),
                    "DrillDown"=>drilldown\DrillDownBoard::create()->icon("fa fa-chart-pie")->badge("New"),
                    "Pivot"=>pivot\PivotBoard::create()->icon("fas fa-border-all")->badge("New"),
                    "KWidget"=>kwidgets\KWidgetsBoard::create()->icon("fas fa-gift"),
                    "Pivot"=>pivot\PivotBoard::create()->icon("fas fa-cube")->badge("NEW"),
                    "Detail Modal"=>detailmodal\DetailModalBoard::create()->icon("far fa-window-restore")->badge("New"),
                    "AutoUpdate"=>autoupdate\AutoUpdateBoard::create()->icon("fas fa-sync"),    
                ]),

                "Containers"=>Group::create()->icon("fas fa-boxes")->sub([
                    "Modal"=>modal\ModalBoard::create()->icon("far fa-window-maximize"),
                    "Tabs"=>tabs\TabsBoard::create()->icon("fab fa-mendeley"),
                    "Panel"=>panel\PanelBoard::create()->icon("fas fa-columns")->badge("New"),    
                ]),
                
                "Inputs"=>Group::create()->icon("far fa-keyboard")->sub([
                    "Inputs"=>inputs\InputsBoard::create()->icon("far fa-keyboard"),
                    "Buttons"=>buttons\ButtonBoard::create()->icon("fas fa-square"),
                    "Toggle"=>toggle\ToggleBoard::create()->icon("fas fa-toggle-off")->badge("New"),
                    "Dropdown"=>dropdown\DropdownBoard::create()->icon("far fa-list-alt")->badge("New"),    
                ]),
                
                "DataSources"=>Group::create()->icon("fas fa-database")->sub([
                    "Caching"=>cache\CacheBoard::create()->icon("fas fa-bolt"),
                    "CSV Source"=>csvsource\CSVSourceBoard::create()->icon("fas fa-file-csv"),
                    "Excel Source"=>excelsource\ExcelSourceBoard::create()->icon("far fa-file-excel"),    
                ]),
                
                "Exporting"=>Group::create()->icon("fas fa-file-export")->sub([
                    "PDF"=>pdf\PDFBoard::create()->title("PDF Export")->icon("far fa-file-pdf")->badge("New"),
                ])->badge("New"),      
            ]),
            
            "Admin Panel"=>Section::create()->sub([
                "Customers"=>admin\customer\Customer::create()->icon("fas fa-users"),
                "Orders"=>admin\order\Order::create()->icon("fa fa-car"),
            ]),
        ];
    }

    protected function topMenu()
    {
        return [
            "About"=>MenuItem::create()
                ->href("https://www.koolreport.com/packages/dashboard")
                ->target("_blank"),
            "Forums"=>MenuItem::create()
                ->href("https://www.koolreport.com/forum/topics")
                ->target("_blank"),
        ];
    }

    protected function accountMenu()
    {
        return [
            "Logout"=>MenuItem::create()
                ->icon("fa fa-lock")       
                ->onClick(Client::logout())
        ];
    }

    protected function export()
    {
        return ExportHandler::create()
                ->storage(dirname(__DIR__)."/storage")
                ->pdfEngine(
                    ChromeHeadlessio::create()
                    ->token("716168c297fb0486d4cf24458ac2f860364f277f081630d640e16ac313aba310")
                );
    }
}