<?php

namespace demo\inputs;

use \koolreport\dashboard\inputs\TextBox;

class TextBoxDemo extends TextBox
{
    protected function actionChange($request, $response)
    {
        $this->sibling("Result")->update();
    }
}