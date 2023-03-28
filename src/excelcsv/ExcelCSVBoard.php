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
        $this->xlsxExportable([
            // "useTable" => true,
            // 'viewDir' => __DIR__,
            // 'viewFile' => 'ExcelCSVBoardExcel',
            'engine' => 'ExcelEngine'
        ]);
        $this->csvExportable([
            'delimiter' => '||'
        ]);
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
                                        ->exportToCSV("Revenue 2022 Dashboard", [
                                            // 'delimiter' => ';'
                                        ])
                                ),
                            Dropdown::menuItem()
                                ->text("LineChart to Excel")
                                ->icon("far fa-file-excel")
                                ->onClick(
                                    Client::widget("LineChartDemo")
                                        ->exportToXLSX("Revenue 2022 Chart")
                                ),
                            Dropdown::menuItem()
                                ->text("LineChart Data to Excel")
                                ->icon("far fa-file-excel")
                                ->onClick(
                                    Client::widget("LineChartDemo")
                                        ->exportToXLSX("Revenue 2022 Chart Data", [
                                            // 'rawData' => false,
                                            'useTable' => true,
                                            // 'viewDir' => __DIR__ . '/../googlecharts/',
                                            // 'viewFile' => "LineChartDemoExcel2",
                                            'viewFile' => null,
                                        ])
                                ),
                            Dropdown::menuItem()
                                ->text("LineChart Data to CSV")
                                ->icon("fa fa-file-csv")
                                ->onClick(
                                    Client::widget("LineChartDemo")
                                        ->exportToCSV("Revenue 2022 Chart Data", [
                                            // 'delimiter' => '|||'
                                        ])
                                ),
                        ]),
                ])->class("text-right"),

                LineChartDemo::create()
                    ->xlsxExportable([
                        'rawData' => true,
                        "useTable" => false,
                        // 'viewDir' => __DIR__ . '/../googlecharts/',
                        // 'viewFile' => './LineChartDemoExcel',
                    ])
                    ->csvExportable([
                        // 'delimiter' => '||'
                    ]),

                BarChartDemo::create()
                    ->xlsxExportable([
                        'rawData' => true,
                        "useTable" => false,
                        // 'viewDir' => __DIR__ . '/../googlecharts/',
                        // 'viewFile' => './BarChartDemoExcel',
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
