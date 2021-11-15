<?php

namespace demo\inputs;

use \koolreport\dashboard\widgets\Text;

class Result extends Text
{
    protected function onInit()
    {
        $this
        ->text(function(){
            $html = "";
            $list = [
                "TextBoxDemo",
                "SelectDemo",
                "DateTimePickerDemo",
                "DateRangePickerDemo",
                "Select2Demo",
                "MultipleSelect2Demo",
                "CheckBoxListDemo",
                "RadioListDemo",
                "TextAreaDemo"
            ];
            foreach($list as $name)
            {
                $value = json_encode($this->sibling($name)->value());
                $value = htmlentities($value);
                $html .= "<div><b>$name</b> = $value</div>";
            }
            return $html;
        })
        ->asHtml(true);
    }
}