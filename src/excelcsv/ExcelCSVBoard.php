<?php

namespace demo\excelcsv;

use demo\googlecharts\BarChartDemo;
use demo\googlecharts\LineChartDemo;
use koolreport\dashboard\Client;
use koolreport\dashboard\containers\Html;
use koolreport\dashboard\containers\Panel;
use koolreport\dashboard\Dashboard;
use koolreport\dashboard\inputs\Button;
use koolreport\dashboard\inputs\Dropdown;

class ExcelCSVBoard extends Dashboard
{
    protected function onInit()
    {
        // $this->pdfExportable(true);
        // $this->xlsxExportable(true);
        $this->xlsxExportable([
            // 'viewDir' => __DIR__,
            'excelView' => 'ExcelCSVBoardExcel',
        ]);
        $this->csvExportable(true);
    }

    protected function content()
    {
        return [
            Panel::success([
                Html::div([
                    Dropdown::create("exporting")
                    ->title("Export")
                    ->align("right")
                    ->items([
                        Dropdown::menuItem()
                            ->text("Dashboard to Excel")
                            ->icon("far fa-file-excel")
                            ->onClick(
                                Client::dashboard($this)
                                    ->exportToXLSX("Revenue 2022 Dashboard")
                            ),
                        Dropdown::menuItem()
                            ->text("Dashboard to CSV")
                            ->icon("far fa-file-excel")
                            ->onClick(
                                Client::dashboard($this)
                                    ->exportToCSV("Revenue 2022 Dashboard")
                            ),
                        Dropdown::menuItem()
                            ->text("Chart to Excel")
                            ->icon("far fa-file-excel")
                            ->onClick(
                                Client::widget("LineChartDemo")
                                    ->exportToXLSX("Revenue 2022 Chart")
                            ),
                        Dropdown::menuItem()
                            ->text("Chart Data to Excel")
                            ->icon("far fa-file-excel")
                            ->onClick(
                                Client::widget("LineChartDemo")
                                    ->exportToXLSX("Revenue 2022 Chart Data", [
                                        // 'rawData' => false,
                                        'useTable' => true,
                                        // 'viewDir' => __DIR__ . '/../googlecharts/',
                                        // 'excelView' => "LineChartDemoExcel2",
                                        'excelView' => null,
                                    ])
                            ),
                        Dropdown::menuItem() 
                            ->text("Chart Data to CSV")
                            ->icon("fa fa-file-csv")
                            ->onClick(
                                Client::widget("LineChartDemo")
                                    ->exportToCSV("Revenue 2022 Chart Data")
                            ),
                    ]),
                ])->class("text-right"),

                LineChartDemo::create()
                    ->xlsxExportable([
                        'rawData' => true,
                        "useTable" => false,
                        // 'viewDir' => __DIR__ . '/../googlecharts/',
                        'excelView' => '../googlecharts/LineChartDemoExcel',
                    ])
                    ->csvExportable(true),

                BarChartDemo::create()
                    ->xlsxExportable([
                        'rawData' => true,
                        "useTable" => false,
                        // 'viewDir' => __DIR__ . '/../googlecharts/',
                        'excelView' => '../googlecharts/BarChartDemoExcel',
                    ])
                    ->csvExportable(true)
            ])
            ->header("Excel & CSV"),

            \demo\CodeDemo::create("
                    The example shows you how to export data of chart to Excel and CSV.
            ")->raw(true)
        ];
    }
}