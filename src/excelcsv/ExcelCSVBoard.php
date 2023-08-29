<?php

namespace demo\excelcsv;

use demo\googlecharts\LineChartDemo;
use koolreport\dashboard\Client;
use koolreport\dashboard\containers\Html;
use koolreport\dashboard\containers\Panel;
use koolreport\dashboard\Dashboard;
use koolreport\dashboard\inputs\Button;
use koolreport\dashboard\inputs\Dropdown;

class ExcelCSVBoard extends Dashboard
{
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
                            ->text("Chart to Excel")
                            ->icon("far fa-file-excel")
                            ->onClick(
                                Client::widget("LineChartDemo")
                                    ->exportToXLSX("Revenue 2023", ['useTable' => false])
                            ),
                        Dropdown::menuItem()
                            ->text("Data to Excel")
                            ->icon("far fa-file-excel")
                            ->onClick(
                                Client::widget("LineChartDemo")
                                    ->exportToXLSX("Revenue 2023")
                            ),
                        Dropdown::menuItem()
                            ->text("Data to CSV")
                            ->icon("fa fa-file-csv")
                            ->onClick(
                                Client::widget("LineChartDemo")
                                    ->exportToCSV("Revenue 2023")
                            ),
                    ]),
                ])->class("text-right"),

                LineChartDemo::create()
                    ->xlsxExportable(true)
                    ->csvExportable(true)
            ])
            ->header("Excel & CSV"),

            \demo\CodeDemo::create("
                    The example shows you how to export data of chart to Excel and CSV.
            ")->raw(true)
        ];
    }
}