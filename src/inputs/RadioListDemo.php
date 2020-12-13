<?php

namespace demo\inputs;

use \koolreport\dashboard\inputs\RadioList;
use \koolreport\dashboard\fields\Text;
use \koolreport\dashboard\fields\Number;
use \demo\AutoMaker;

class RadioListDemo extends RadioList
{
    protected function dataSource()
    {
        return AutoMaker::table("customers")
                ->select("customerName","customerNumber")
                ->limit(5);
    }

    protected function actionChange($request, $response)
    {
        $this->sibling("Result")->update();
    }

    protected function fields()
    {
        return [
            Number::create("customerNumber"),
            Text::create("customerName"),
        ];
    }
}