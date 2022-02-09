<?php

namespace demo\inputs;

use \koolreport\dashboard\fields\Text;
use \demo\AutoMaker;
use koolreport\dashboard\inputs\BSelect;

class BSelectDemo extends BSelect
{
    protected function onCreated()
    {
        $this->multiple(true);
        $listStore = $this->dataSource()->run();
        $this->defaultValue($listStore->pluck("customerName"));
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