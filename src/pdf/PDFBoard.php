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
            ->jpgExportable(true)    //Allow exporting dashboard to JPG
            ->pngExportable(true)    //Allow exporting dashboard to PNG
            // ->xlsxExportable(true)   //Allow exporting dashboard to XLSX
            // ->csvExportable(true)   //Allow exporting dashboard to CSV
        ;

        $this->pdfExportable([
            // "format" => "A4",
            // "orientation" => "landscape",
            // 'margin' => '1cm',
            // "margin" => [
            //     "top" => "1in",
            //     "bottom" => "1in",
            //     "left" => "1in",
            //     "right" => "1in",
            // ],

            // 'viewFile' => 'PDFBoardPDF',
            // 'viewFile' => 'PDFBoardPDF2',
            'engine' => 'LocalPdfEngine',
            // 'engine' => 'CloudPdfEngine',
        ]);
    }

    protected function content()
    {
        return [
            Panel::create()->header("PDF Export")->type("danger")->sub([
                Dropdown::create("exportOptions")
                    ->title("<i class='far fa-file-pdf'></i> Export To PDF")
                    ->items([
                        "Dashboard Local Export" => MenuItem::create()
                            ->onClick(
                                Client::showLoader() .
                                    Client::dashboard($this)->exportToPDF("PDFBoard", [
                                        // 'viewFile' => 'PDFBoardPDF',
                                        // 'engine' => 'CloudPdfEngine'
                                    ])
                            ),
                        "Table's current page Local Export" => MenuItem::create()
                            ->onClick(
                                Client::showLoader() .
                                    Client::widget("ProductTable")->exportToPDF("Products - Current Page", [
                                        "all" => false,
                                        // 'viewFile' => 'ProductTablePDF',
                                        // 'engine' => 'CloudPdfEngine'
                                    ])
                            ),
                        "Table's all pages Local Export" => MenuItem::create()
                            ->onClick(
                                Client::showLoader() .
                                    Client::widget("ProductTable")->exportToPDF("All Products", [
                                        "all" => true,
                                        // 'viewFile' => 'ProductTablePDF',
                                        // 'engine' => 'CloudPdfEngine'
                                    ])
                            ),
                        "Dashboard Cloud Export" => MenuItem::create()
                            ->onClick(
                                Client::showLoader() .
                                    Client::dashboard($this)->exportToPDF("PDFBoard", [
                                        // 'viewFile' => 'PDFBoardPDF',
                                        'engine' => 'CloudPdfEngine'
                                    ])
                            ),
                        "Table's current page Cloud Export" => MenuItem::create()
                            ->onClick(
                                Client::showLoader() .
                                    Client::widget("ProductTable")->exportToPDF("Products - Current Page", [
                                        "all" => false,
                                        // 'viewFile' => 'ProductTablePDF',
                                        'engine' => 'CloudPdfEngine'
                                    ])
                            ),
                        "Table's all pages Cloud Export" => MenuItem::create()
                            ->onClick(
                                Client::showLoader() .
                                    Client::widget("ProductTable")->exportToPDF("All Products", [
                                        "all" => true,
                                        // 'viewFile' => 'ProductTablePDF',
                                        'engine' => 'CloudPdfEngine'
                                    ])
                            ),                            
                        // Dropdown::menuItem()
                        //     ->text("Export to Excel")
                        //     ->icon("far fa-file-excel")
                        //     ->onClick(
                        //         Client::widget("ProductTable")
                        //             ->exportToXLSX("ProductTable 2022", ["all"=>true])
                        //     ),
                        // Dropdown::menuItem()
                        //     ->text("Export to CSV")
                        //     ->icon("fa fa-file-csv")
                        //     ->onClick(
                        //         Client::widget("ProductTable")
                        //             ->exportToCSV("ProductTable 2022", ["all"=>true])
                        //     ),
                    ])
                    ->align("right")
                    ->cssStyle("margin-bottom:5px;")
                    ->cssClass("text-right"),

                ProductTable::create()
                    ->pdfExportable([
                        // 'viewFile' => 'ProductTablePDF',
                        'engine' => 'LocalPdfEngine',
                    ])
                // ->xlsxExportable(['rawData' => false])
                // ->csvExportable(true)
            ]),

            \demo\CodeDemo::create("
                This example shows you how to export your widget to PDF. Above is a table listing hundred of products.
                By clicking to [Export to PDF] button, you will have choices to export the current page of table or
                the whole table to PDF format.
            ")->raw(true)

        ];
    }
}
