<?php

namespace demo\pdf;

use \koolreport\dashboard\Dashboard;

use \koolreport\dashboard\containers\Row;
use \koolreport\dashboard\containers\Panel;

use \koolreport\dashboard\inputs\DropDown;
use \koolreport\dashboard\menu\MenuItem;
use \koolreport\dashboard\Client;

class PDFBoard extends Dashboard
{
    protected function widgets()
    {
        return [
            Panel::create()->sub([
                DropDown::create("exportOptions")
                ->title("<i class='far fa-file-pdf'></i> Export To PDF")
                ->items([
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
                ])
                ->cssStyle("margin-bottom:5px;"),
                ProductTable::create()
            ])
        ];
    }
}