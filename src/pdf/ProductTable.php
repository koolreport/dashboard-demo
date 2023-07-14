<?php

namespace demo\pdf;

use \koolreport\dashboard\widgets\Table;
use \demo\AutoMaker;

use \koolreport\dashboard\fields\Text;
use \koolreport\dashboard\fields\Number;
use \koolreport\dashboard\fields\Currency;
use \koolreport\dashboard\containers\Html;


class ProductTable extends Table
{
    protected function onInit()
    {
        $this
        ->pageSize(10)
        // ->pdfExportable(true)
        ; //Turn on pdf exportable for table
    }

    protected function onExporting($params)
    {
        if($params["all"]===true) {
            $this->pageSize(null);
        }
        return true;
    }

    public function exportedView()
    {
        return  Html::div([
                    Html::h1("Product List")
                ])->class("text-center")->view().
                $this->view();
    }

    protected function excelSetting()
    {
        return [
            "showFooter" => true,
            "excelStyle" => [
                // ...
            ]
        ];
    }

    protected function dataSource()
    {
        return AutoMaker::table("products")
                ->select("productName","productVendor","quantityInStock","buyPrice");
    }

    protected function fields()
    {
        return [
            Text::create("productName"),
            Text::create("productVendor"),
            Number::create("quantityInStock"),
            Currency::create("buyPrice")->USD()->symbol()
        ];
    }

}
