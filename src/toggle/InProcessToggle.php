<?php

namespace demo\toggle;

use \koolreport\dashboard\inputs\Toggle;

class InProcessToggle extends Toggle
{
    protected function onCreated()
    {
        $this
        ->showText(true)
        ->type("info")
        ->defaultValue(1);
    }

    protected function actionChange()
    {
        $this
        ->sibling("OrderTable")
        ->pageIndex(0)
        ->updateEffect("none")
        ->update();
    }
}