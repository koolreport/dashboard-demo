<?php

namespace demo\inputs;

use \koolreport\dashboard\inputs\DateTimePicker;

class DateTimePickerDemo extends DateTimePicker
{
    protected function onCreated()
    {
        $this->defaultValue(date("Y-m-d 00:00:00"));
    }
    protected function actionChange($request, $response)
    {
        $this->sibling("Result")->update();
    }
}