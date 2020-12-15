<?php

namespace demo\modal;

use \koolreport\dashboard\inputs\Button;
use \koolreport\dashboard\containers\Modal;

class SubmitButton extends Button
{
    protected function onCreated()
    {
        $this->laddaOnAction(true);
    }
    protected function actionSubmit($request, $response)
    {
        $response->runScript(Modal::show("largeModal"));
    }
}