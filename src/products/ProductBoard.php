<?php

namespace demo\products;

use \koolreport\dashboard\Dashboard;

use \koolreport\dashboard\containers\Row;
use \koolreport\dashboard\containers\Panel;
use \koolreport\dashboard\widgets\Text;
use \koolreport\dashboard\widgets\StateHolder;

use \koolreport\dashboard\menu\MenuItem;
use \koolreport\dashboard\Client;
use \koolreport\dashboard\containers\Html;

class ProductBoard extends Dashboard
{

    protected function content()
    {
        return [
            Row::create()->sub([
                Panel::create()
                ->header("<b>Product By Line</b>")
                ->type("primary")
                ->sub([
                    Html::p("Click to chart to view the detail list of that product")->style("font-style:italic"),
                    ProductByLine::create()
                        ->detailShowable(true)
                ])
                ->menu([
                    "See details"=>MenuItem::create()->icon("fa fa-table")
                        ->onClick(
                            Client::showLoader().
                            Client::widget("ProductByLine")->showDetail()
                        ),
                ])
                ->width(1/3),
                
                Panel::create()
                ->header("<b>Product List</b>")
                ->type("warning")
                ->sub([
                    Text::create("guide")->text(function(){
                        $selectedProductLine = $this->dashboard()->widget("ProductByLine")->selectedProductLine();
                        if($selectedProductLine!==null) {
                            return Html::p(["List of ",Html::b($selectedProductLine)," products"]);
                        }
                        return null;
                    })->asHtml(true),
                    ProductTable::create()
                        ->pdfExportable(true),
                ])
                ->menu([
                    "Pdf Export"=>MenuItem::create()->icon("far fa-file-pdf")
                        ->onClick(
                            Client::showLoader().
                            Client::widget("ProductTable")->exportToPDF()
                        ),
                ])
            ]),
            \demo\CodeDemo::create("
                This example shows the comparison among product lines by its number of product. The comparison
                is shown by PieChart. When user clicks to each pie, the dashboard will show list of products for that line.
                This is a type of master-detail model. Not forget to mention, there is a option of right-panel tab that allows
                us to export list of product by line to PDF.
            ")
        ];
    }
}