<?php

namespace demo\products;

use \koolreport\dashboard\widgets\google\DonutChart;
use \demo\AutoMaker;

class ProductByLine extends DonutChart
{
    use \koolreport\dashboard\TWidgetState;
    protected function onInit()
    {
        $this->options([
            "legend"=>[
                "position"=>"none"
            ],
            "theme"=>"maximized",
        ])
        ->height("240px");
    }
    protected function dataSource()
    {
        return AutoMaker::table("products")
                ->groupBy("productLine")
                ->select("productLine")
                ->count()->alias("quantity");
    }

    /**
     * Public the selected product line from state
     * so that product table can access
     */
    public function selectedProductLine()
    {
        return $this->state("selectedProductLine");
    }

    protected function actionRowSelect($request, $response)
    {
        /**
         * Get the selected product line from parameter
         * Save it to state
         */
        $params = $request->params();
        $this->state("selectedProductLine",$params["selectedRow"][0]);
        $this->sibling("ProductTable")->pageIndex(0)->update();
        $this->sibling("guide")->update();
    }

}