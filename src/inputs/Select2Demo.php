<?php

namespace demo\inputs;

use \koolreport\dashboard\inputs\Select2;
use \koolreport\dashboard\fields\Text;
use \koolreport\dashboard\fields\Number;
use \demo\AutoMaker;

class Select2Demo extends Select2
{
    protected function dataSource()
    {
        return AutoMaker::table("customers")
                ->select("country")
                ->groupBy("country");
    }

    protected function actionChange($request, $response)
    {
        $this->sibling("Result")->update();
    }

    protected function fields()
    {
        return [
            Text::create("country"),
        ];
    }
}