<?php

namespace demo\export_engines;

use \koolreport\dashboard\Dashboard;

use \koolreport\dashboard\containers\Row;
use \koolreport\dashboard\containers\Panel;

use \koolreport\dashboard\inputs\Dropdown;
use \koolreport\dashboard\menu\MenuItem;
use \koolreport\dashboard\Client;
use \koolreport\dashboard\containers\Html;
use \demo\pdf\ProductTable;

class ExportEngineBoard extends Dashboard
{
    protected function content()
    {
        return [
            Panel::create()->header("Exporting with view files")->type("danger")->sub([
                Dropdown::create("exportOptions")
                    ->title("<i class='far fa-file-pdf'></i> Export to PDF with")
                    ->items([
                        "Local Export engine" => MenuItem::create()
                            ->onClick(
                                Client::showLoader() .
                                    Client::widget("ProductTable")->exportToPDF("Products - Current Page", [
                                        "all" => false,
                                    ])
                            ),
                        "Cloud Export engine" => MenuItem::create()
                            ->onClick(
                                Client::showLoader() .
                                    Client::widget("ProductTable")->exportToPDF("Products - Current Page", [
                                        "all" => false,
                                        'engine' => 'CloudPdfEngine'
                                    ])
                            ),
                    ])
                    ->align("right")
                    ->cssStyle("margin-bottom:5px;")
                    ->cssClass("text-right"),

                ProductTable::create()
                    ->pdfExportable([
                        'engine' => 'LocalPdfEngine',
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
