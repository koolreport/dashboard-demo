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
    protected function onInit()
    {
        $this->pdfExportable(true); //Turn on pdf exportable for dashboard
    }

    protected function content()
    {
        return [
            Panel::create()->header("PDF Export")->type("danger")->sub([
                Dropdown::create("exportOptions")
                    ->title("<i class='far fa-file-pdf'></i> Export to PDF")
                    ->items([
                        "Dashboard" => MenuItem::create()
                            ->onClick(
                                Client::showLoader() .
                                    Client::dashboard($this)->exportToPDF("PDFBoard")
                            ),
                        "Table's Current Page" => MenuItem::create()
                            ->onClick(
                                Client::showLoader() .
                                    Client::widget("ProductTable")->exportToPDF("Products - Current Page", ["all" => false])
                            ),
                        "Table's All Pages" => MenuItem::create()
                            ->onClick(
                                Client::showLoader() .
                                    Client::widget("ProductTable")->exportToPDF("All Products", ["all" => true])
                            ),
                    ])
                    ->align("right")
                    ->cssStyle("margin-bottom:5px;")
                    ->cssClass("text-right"),
                ProductTable::create()
                    ->pdfExportable(true)
            ]),

            \demo\CodeDemo::create("
                This example shows you how to export your widget to PDF. Above is a table listing hundred of products.
                By clicking to [Export to PDF] button, you will have choices to export the current page of table or
                the whole table to PDF format.
            ")->raw(true)

        ];
    }
}
