<?php

namespace demo\visualquery;

use \koolreport\dashboard\inputs\Button;

class ButtonDemo extends Button
{
    protected function actionSubmit($request, $response)
    {
        $this->sibling("Result")->update();
        $this->sibling("ResultTable")->update();
    }
}