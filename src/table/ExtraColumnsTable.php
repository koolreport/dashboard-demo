<?php

namespace demo\table;

use \koolreport\dashboard\widgets\Table;

use \koolreport\dashboard\fields\Icon;
use \koolreport\dashboard\fields\Badge;
use \koolreport\dashboard\fields\Button;
use \koolreport\dashboard\fields\Sparkline;
use \koolreport\dashboard\fields\Image;
use \koolreport\dashboard\fields\Progress;
use \koolreport\dashboard\fields\Text;

use demo\AutoMaker;

class ExtraColumnsTable extends Table
{
    protected function dataSource()
    {
        return [
            [
                "paymentMethod"=>"visa",
                "status"=>"Completed",
                "customerNumber"=>141,
                "progress"=>100,
                "customerName"=>"Marry Watson",
                "customerAvatar"=>"5.jpg"
            ],
            [
                "paymentMethod"=>"mastercard",
                "status"=>"Incompleted",
                "customerNumber"=>124,
                "progress"=>60,
                "customerName"=>"Peter Carson",
                "customerAvatar"=>"8.jpg"
            ],
        ];
    }

    protected function fields()
    {
        return [
            Image::create("customerAvatar")->label("Image")
                ->prefix(substr($_SERVER['REQUEST_URI'],0,strrpos($_SERVER['REQUEST_URI'],"/"))."/images/")
                ->squared("32px")
                ->rounded(true),
            Icon::create("paymentMethod")->label("Icon")
            ->icon(function($method){
                return "fab fa-cc-".$method;
            })->cssStyle("font-size:28px"),

            Progress::create("progress")->label("Progress")
            ->range([
                "danger"=>20,
                "warning"=>50,
                "success"=>80
            ]),
    
            Badge::create("status")->label("Badge")
            ->type(function($status){
                if($status==="Completed") {
                    return "success";
                }
                return "danger";
            }),
            Sparkline::create("pastPayments")->label("Sparkline")
                ->colName("customerNumber")
                ->type("bar")
                ->dataSource(function(){
                    return AutoMaker::table("payments")
                    ->where("customerNumber",$this->value())
                    ->select("amount");
                }),
            Button::create()->label("Button")
                ->type("primary")
                ->text("Details")
                ->size("sm")
                ->onClick(function ($value, $row){
                    return "alert(\"Will show detail order of ".$row["customerName"]."\");";
                }),
        ];
    }
}