<?php

namespace demo\buttons;
use \koolreport\dashboard\inputs\Button;

class LaddaButton extends Button
{
    protected function onInit()
    {
        $this->laddaOnAction(true);
    }

    protected function actionSubmit($request, $response)
    {
        
    }
}