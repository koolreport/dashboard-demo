<?php
namespace demo\table;

use koolreport\dashboard\containers\Html;
use koolreport\dashboard\inputs\Button;
use koolreport\dashboard\notifications\Alert;

class ViewSelectedRowButton extends Button
{
    protected function onCreated()
    {
        $this->text("View Selected Row");
    }

    protected function actionSubmit($request, $response)
    {
        $conditions = $this->sibling("RowSelectTable")->getRowSelectedConditions();
        return Alert::info(Html::pre(json_encode($conditions,JSON_PRETTY_PRINT)),"Selected Row Conditions");
    }
}
