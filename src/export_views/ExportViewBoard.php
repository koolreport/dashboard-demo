<?php

namespace demo\export_views;

use \koolreport\dashboard\Dashboard;

use \koolreport\dashboard\containers\Row;
use \koolreport\dashboard\containers\Panel;

use \koolreport\dashboard\inputs\Dropdown;
use \koolreport\dashboard\menu\MenuItem;
use \koolreport\dashboard\Client;
use \koolreport\dashboard\containers\Html;
use \demo\pdf\ProductTable;
use demo\googlecharts\BarChartDemo;
use demo\googlecharts\LineChartDemo;

class ExportViewBoard extends Dashboard
{
    protected function onCreated()
    {
        $this
            ->pdfExportable([
                'viewFile' => './export_views/ExportViewBoardPDF',
            ])
            ->xlsxExportable([
                'viewFile' => './export_views/ExportViewBoardExcel',
            ]);
    }

    protected function content()
    {
        return [
            Panel::create()->header("Export using view file")->type("danger")->sub([
                Dropdown::create("exportOptions")
                    ->title("<i class='far fa-file-pdf'></i> Export Views")
                    ->items([
                        Dropdown::menuItem()
                            ->text("Dashboard to PDF")
                            ->icon("far fa-file-excel")
                            ->onClick(
                                Client::dashboard($this)
                                    ->exportToPDF("Dashboard - Revenue 2022")
                            ),
                        Dropdown::menuItem()
                            ->text("LineChart to PDF")
                            ->icon("far fa-file-excel")
                            ->onClick(
                                Client::widget("LineChartDemo")
                                    ->exportToPDF("Chart - Revenue 2022")
                            ),                           
                        Dropdown::menuItem()
                            ->text("Dashboard to Excel")
                            ->icon("far fa-file-excel")
                            ->onClick(
                                Client::dashboard($this)
                                    ->exportToXLSX("Dashboard - Revenue 2022")
                            ),
                        Dropdown::menuItem()
                            ->text("LineChart to Excel")
                            ->icon("far fa-file-excel")
                            ->onClick(
                                Client::widget("LineChartDemo")
                                    ->exportToXLSX("Chart - Revenue 2022")
                            ),
                    ])
                    ->align("right")
                    ->cssStyle("margin-bottom:5px;")
                    ->cssClass("text-right"),
                
                LineChartDemo::create()
                    ->pdfExportable([
                        'viewFile' => './pdf_views/LineChartDemo',
                    ])
                    ->xlsxExportable([
                        'viewFile' => './excel_views/LineChartDemo',
                    ]),

                BarChartDemo::create()
                    ->pdfExportable([
                        'viewFile' => './pdf_views/BarChartDemo',
                    ])
                    ->xlsxExportable([
                        'viewFile' => './excel_views/BarChartDemo',
                    ]),

                ProductTable::create()
                    ->pdfExportable([
                        'viewFile' => './export_views/ProductTablePDF',
                    ])
                    ->xlsxExportable([
                        'viewFile' => './export_views/ProductTableExcel',
                    ])
            ]),

            \demo\CodeDemo::create("
                This example shows you how to export your widget to PDF. Above is a table listing hundred of products.
                By clicking to [Export to PDF] button, you will have choices to export the current page of table or
                the whole table to PDF format.
            ")->raw(true)

        ];
    }
}
