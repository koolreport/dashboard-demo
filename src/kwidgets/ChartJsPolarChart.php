<?php

namespace demo\kwidgets;

use \koolreport\dashboard\widgets\KWidget;

use \demo\AutoMaker;
use \koolreport\dashboard\ColorList;

class ChartJsPolarChart extends KWidget
{
    protected function dataSource()
    {
        return array(
            array("category"=>"Books","sale"=>32000,"cost"=>20000,"profit"=>12000),
            array("category"=>"Accessories","sale"=>43000,"cost"=>36000,"profit"=>7000),
            array("category"=>"Phones","sale"=>54000,"cost"=>39000,"profit"=>15000),
            array("category"=>"Movies","sale"=>23000,"cost"=>18000,"profit"=>5000),
            array("category"=>"Others","sale"=>12000,"cost"=>6000,"profit"=>6000),
        );
    }

    protected function onCreated()
    {
        $this
        ->use(\koolreport\chartjs\PolarChart::class)
        ->settings([
            "title"=>"PolarChart",
            "colorScheme"=>ColorList::random(),
            "columns"=>array(
                "category","cost"
            )
        ]);
    }

}
