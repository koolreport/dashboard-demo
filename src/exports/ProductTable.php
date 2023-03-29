<?php

namespace demo\exports;

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
        ->showFooter(true)
        ->pageSize(10)
        // ->pdfExportable(true) //Turn on pdf exportable for table
        ; 
    }

    protected function onExporting($params)
    {
        if($params["all"]===true) {
            $this->pageSize(null);
        }
        return true;
    }

    protected function excelSetting()
    {
        // return [];

        $styleArray = [
            'font' => [
                'name' => 'Calibri', //'Verdana', 'Arial'
                'size' => 30,
                'bold' => true,
                'italic' => true,
                'underline' => 'none', //'double', 'doubleAccounting', 'single', 'singleAccounting'
                'strikethrough' => FALSE,
                'superscript' => false,
                'subscript' => false,
                'color' => [
                    'rgb' => '808080',
                    'argb' => 'FF000000',
                ]
            ],
        ];

        return [
            // "columns" => [
            //     "buyPrice" =>[
            //         "footer" => "sum"
            //     ]
            // ],
            // "showHeader" => false,
            "showFooter" => true,
            // "excelStyle" => [
            //     "header" => function($colName) use ($styleArray) { 
            //         return $styleArray; 
            //     },
            //     "cell" => function($colName, $value, $row) use ($styleArray)  { 
            //         return $styleArray; 
            //     },
            // ]
        ];
    }

    public function exportedView()
    {
        return  Html::div([
                    Html::h1("Product List")
                ])->class("text-center")->view().
                $this->view();
    }

    protected function dataSource()
    {
        $qb = AutoMaker::table("products")
                ->select("productName","productVendor","quantityInStock","buyPrice");
        return $qb;
    }

    protected function fields()
    {
        return [
            Text::create("productName"),
            Text::create("productVendor"),
            Number::create("quantityInStock"),
            Currency::create("buyPrice")->label('Buy Price')->USD()->symbol()
                ->footer("sum")
        ];
    }

}
