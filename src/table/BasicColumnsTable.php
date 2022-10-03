<?php

namespace demo\table;

use \koolreport\dashboard\widgets\Table;
use \koolreport\dashboard\fields\Text;
use \koolreport\dashboard\fields\Number;
use \koolreport\dashboard\fields\Currency;
use \koolreport\dashboard\fields\Percent;
use \koolreport\dashboard\fields\Calculated;
use \koolreport\dashboard\fields\DateTime;

class BasicColumnsTable extends Table
{
    protected function dataSource()
    {
        return [
            [
                "productName"=>"iPhone 12 Pro",
                "quantity"=>200,
                "price"=>999,
                "discount"=>10,
                "orderDate"=>"2022-12-02 14:12:00",
            ],
            [
                "productName"=>"iPhone 12 Pro Max",
                "quantity"=>100,
                "price"=>1099,
                "discount"=>5,
                "orderDate"=>"2022-12-05 14:12:00",
            ]
        ];
    }

    protected function fields()
    {
        return [
            Text::create("productName")
                ->label("Text"),
            
            Number::create("quantity")
                ->label("Number"),
            
            Currency::create("price")
                ->USD()
                ->symbol()
                ->decimals(0)
                ->label("Currency"),
            
            Percent::create("discount")
                ->label("Percent"),
            
            Calculated::create("total",function($row){
                return $row["quantity"] * $row["price"] * (1-$row["discount"]/100);
            })->formatUsing(function($value){
                return "$".number_format($value);
            })->label("Calculated"),

            DateTime::create("orderDate")
                ->displayFormat("M jS, Y")
                ->label("DateTime")
        ];
    }
}