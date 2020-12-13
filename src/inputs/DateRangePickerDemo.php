<?php

namespace demo\inputs;

use \koolreport\dashboard\inputs\DateRangePicker;

class DateRangePickerDemo extends DateRangePicker
{
    protected function onCreated()
    {
        $this->defaultValue(DateRangePicker::today());
    }
    protected function actionChange($request, $response)
    {
        $this->sibling("Result")->update();
    }
}