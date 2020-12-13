<?php

namespace demo\inputs;

use \koolreport\dashboard\inputs\Select;
use \koolreport\dashboard\fields\Text;
use \koolreport\dashboard\fields\Number;
use \demo\AutoMaker;

class SelectDemo extends Select
{
    protected function onCreated()
    {
        $this->defaultOption(["--"=>null]);
    }

    protected function dataSource()
    {
        return AutoMaker::table("customers")
                ->select("customerName")
                ->limit(5);
    }

    protected function actionChange($request, $response)
    {
        $this->sibling("Result")->update();
    }

    protected function fields()
    {
        return [
            Text::create("customerName"),
        ];
    }
}