<?php

namespace demo\inputs;

use \koolreport\dashboard\inputs\CheckBoxList;
use \koolreport\dashboard\fields\Text;
use \koolreport\dashboard\fields\Number;
use \demo\AutoMaker;

class CheckBoxListDemo extends CheckBoxList
{
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