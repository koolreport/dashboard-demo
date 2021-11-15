<?php

namespace demo\inputs;

use \koolreport\dashboard\inputs\TextArea;

class TextAreaDemo extends TextArea
{
    protected function onCreated()
    {
        $this->placeHolder("TextArea");
    }
    protected function actionChange($request, $response)
    {
        $this->sibling("Result")->update();
    }
}