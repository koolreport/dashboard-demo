<?php

namespace demo\chartjs;

use \koolreport\dashboard\widgets\chartjs\RadarChart;
use \koolreport\dashboard\fields\Text;
use \koolreport\dashboard\fields\Currency;
use \koolreport\dashboard\ColorList;

use  \demo\AutoMaker;

class RadarChartDemo extends RadarChart
{
    protected function onInit()
    {
        $this->title("Strength of sale")
        ->colorScheme(ColorList::random());
    }

    protected function dataSource()
    {
        return [
            ["category"=>"Books","sale"=>32000,"cost"=>20000,"profit"=>12000],
            ["category"=>"Accessories","sale"=>43000,"cost"=>36000,"profit"=>7000],
            ["category"=>"Phones","sale"=>54000,"cost"=>39000,"profit"=>15000],
            ["category"=>"Movies","sale"=>23000,"cost"=>18000,"profit"=>5000],
            ["category"=>"Others","sale"=>12000,"cost"=>6000,"profit"=>6000],
        ];
    }

    protected function fields()
    {
        return [
            Text::create("category"),
            Currency::create("sale")
                ->USD()->symbol()
                ->decimals(0),
        ];
    }
}