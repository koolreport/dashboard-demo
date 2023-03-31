<?php

 namespace demo;

use koolreport\dashboard\menu\Group;
use koolreport\dashboard\menu\Section;
use koolreport\dashboard\pages\Main;

 class PublicPage extends Main
 {
    protected function onCreated()
    {
        $this->loginRequired(false); // Do not need login to access
    }
    protected function sidebar()
    {
        return [
            "Home"=>home\HomeBoard::create()->icon("fa fa-home"),
            
            "Admin Panel"=>Section::create()->sub([
                "Customers"=>admin\customer\Customer::create()->icon("fas fa-users"),
                "Orders"=>admin\order\Order::create()->icon("far fa-copy"),
                "Products"=>admin\product\Product::create()->icon("fas fa-car"),
            ]),

            "KPI Dashboard"=>Section::create()->sub([
                "Products"=>products\ProductBoard::create()->icon("fa fa-car"),
                "Orders"=>orders\OrderBoard::create()->icon("fa fa-chart-line"),
                "Payments"=>payments\PaymentBoard::create()->icon("fa fa-hand-holding-usd"),
                "Customers"=>customers\CustomerListBoard::create()->icon("fa fa-users"),
                "CustomerDetails"=>customers\CustomerDetailsBoard::create()->hidden(true),
            ]),
            
            "Components"=>Section::create()->sub([
                "Metrics"=>metrics\MetricsBoard::create()->icon("fa fa-battery-full"),
                "Custom Board"=>customboard\DemoCustomBoard::create()->icon("far fa-edit"),

                "Widgets"=>Group::create()->icon("far fa-chart-bar")->badge("NEW")->sub([
                    "Table"=>table\TableBoard::create()->icon("fa fa-table"),
                    "Google Charts"=>googlecharts\GoogleChartsBoard::create()->icon("fa fa-chart-line"),
                    "D3"=>d3\D3ChartsBoard::create()->icon("fa fa-chart-area"),
                    "ChartJs"=>chartjs\ChartJsBoard::create()->icon("fa fa-chart-bar"),
                    "DrillDown"=>drilldown\DrillDownBoard::create()->icon("fa fa-chart-pie"),
                    "Pivot"=>pivot\PivotBoard::create()->icon("fas fa-border-all"),
                    "KWidget"=>kwidgets\KWidgetsBoard::create()->icon("fas fa-gift"),
                    "Pivot"=>pivot\PivotBoard::create()->icon("fas fa-cube"),
                    "Detail Modal"=>detailmodal\DetailModalBoard::create()->icon("far fa-window-restore"),
                    "AutoUpdate"=>autoupdate\AutoUpdateBoard::create()->icon("fas fa-sync"),    
                    "FlexView"=>flexview\FlexViewBoard::create()->icon("fas fa-sync")->badge("NEW"),    
                ]),

                "Containers"=>Group::create()->icon("fas fa-boxes")->sub([
                    "Modal"=>modal\ModalBoard::create()->icon("far fa-window-maximize"),
                    "Tabs"=>tabs\TabsBoard::create()->icon("fab fa-mendeley"),
                    "Panel"=>panel\PanelBoard::create()->icon("fas fa-columns"),    
                ]),
                
                "Inputs"=>Group::create()->icon("far fa-keyboard")->sub([
                    "Inputs"=>inputs\InputsBoard::create()->icon("far fa-keyboard"),
                    "Buttons"=>buttons\ButtonBoard::create()->icon("fas fa-square"),
                    "Toggle"=>toggle\ToggleBoard::create()->icon("fas fa-toggle-off"),
                    "Dropdown"=>dropdown\DropdownBoard::create()->icon("far fa-list-alt"),
                    "Validators"=>validators\ValidatorBoard::create()->icon("far fa-keyboard"),    
                ]),
                
                "DataSources"=>Group::create()->icon("fas fa-database")->sub([
                    "Caching"=>cache\CacheBoard::create()->icon("fas fa-bolt"),
                    "CSV Source"=>csvsource\CSVSourceBoard::create()->icon("fas fa-file-csv"),
                    "Excel Source"=>excelsource\ExcelSourceBoard::create()->icon("far fa-file-excel"),    
                ]),
                
                "Exporting"=>Group::create()->icon("fas fa-file-export")->sub([
                    "PDF"=>pdf\PDFBoard::create()->title("PDF"),
                    "Excel & CSV"=>excelcsv\ExcelCSVBoard::create()->icon("fas fa-file-excel"),
                    "With Views"=>export_views\ExportViewBoard::create()->title("With Views")->badge("NEW"),
                    "Engine Selection"=>export_engines\ExportEngineBoard::create()->title("Engine Selection")->badge("NEW"),
                ]),
                "Notification"=>notifications\NotificationBoard::create()->icon("far fa-window-restore"),
            ]),
            
        ];
    }
}