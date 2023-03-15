<?php

namespace demo\pdf;

use \koolreport\dashboard\Dashboard;

use \koolreport\dashboard\containers\Row;
use \koolreport\dashboard\containers\Panel;

use \koolreport\dashboard\inputs\Dropdown;
use \koolreport\dashboard\menu\MenuItem;
use \koolreport\dashboard\Client;
use \koolreport\dashboard\containers\Html;

class PDFBoard extends Dashboard
{
    protected function onCreated()
    {
        $this
        ->pdfExportable(true)    //Allow exporting dashboard to PDF
        ->jpgExportable(true)    //Allow exporting dashboard to JPG
        ->pngExportable(true)    //Allow exporting dashboard to PNG
        ->xlsxExportable(true)   //Allow exporting dashboard to XLSX
        ->csvExportable(true)   //Allow exporting dashboard to CSV
        ;

        $this->pdfExportable([
            "format"=>"A4",
            "margin"=>[
                "top"=>"1in",
                "bottom"=>"1in",
                "left"=>"1in",
                "right"=>"1in",
            ],

            // 'pdfView' => 'PDFBoardPDF'
        ]);
    }

    protected function content()
    {
        $pdfName = "PDFBoard";
        $pdfConfig = [
            'pdfView' => 'PDFBoardPDF'
        ];
        return [
            Panel::create()->header("PDF Export")->type("danger")->sub([
                Dropdown::create("exportOptions")
                ->title("<i class='far fa-file-pdf'></i> Export To PDF")
                ->items([
                    "Export Dashboard"=>MenuItem::create()
                        ->onClick(
                            Client::showLoader().
                            Client::dashboard($this)->exportToPDF($pdfName, $pdfConfig)
                        ),
                    "Export Current Page"=>MenuItem::create()
                        ->onClick(
                            Client::showLoader().
                            Client::widget("ProductTable")->exportToPDF("Products - Current Page",["all"=>false])
                        ),
                    "Export All"=>MenuItem::create()
                        ->onClick(
                            Client::showLoader().
                            Client::widget("ProductTable")->exportToPDF("All Products",["all"=>true])
                        ),
                    Dropdown::menuItem()
                        ->text("Export to Excel")
                        ->icon("far fa-file-excel")
                        ->onClick(
                            Client::widget("ProductTable")
                                ->exportToXLSX("ProductTable 2022", ["all"=>true])
                        ),
                    Dropdown::menuItem()
                        ->text("Export to CSV")
                        ->icon("fa fa-file-csv")
                        ->onClick(
                            Client::widget("ProductTable")
                                ->exportToCSV("ProductTable 2022", ["all"=>true])
                        ),
                ])
                ->align("right")
                ->cssStyle("margin-bottom:5px;")
                ->cssClass("text-right"),
                ProductTable::create()
                ->xlsxExportable(['rawData' => false])
                ->csvExportable(true)
            ]),

            \demo\CodeDemo::create("
                This example shows you how to export your widget to PDF. Above is a table listing hundred of products.
                By clicking to [Export to PDF] button, you will have choices to export the current page of table or
                the whole table to PDF format.
            ")->raw(true)

        ];
    }
}