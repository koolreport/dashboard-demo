<?php

namespace demo\inputs;

use \koolreport\dashboard\Dashboard;
use \koolreport\dashboard\containers\Row;
use \koolreport\dashboard\containers\Panel;
use \koolreport\dashboard\Container;
use \koolreport\dashboard\inputs\Button;
use \koolreport\dashboard\containers\Html;

class InputsBoard extends Dashboard
{
    protected function content()
    {
        return [
            Row::create([
                Panel::create()->type("primary")->header("<b>Input Sample</b>")->width(2/3)->sub([
                    Row::create([
                        [
                            Html::label("TextBox")->style("font-weight:bold"),
                            TextBoxDemo::create()
                        ],
                        [
                            Html::label("Select")->style("font-weight:bold"),
                            SelectDemo::create()
                        ]
                    ]),
                    Row::create([
                        [
                            Html::label("DateTimePicker")->style("font-weight:bold"),
                            DateTimePickerDemo::create()
                        ],
                        [
                            Html::label("DateRangePicker")->style("font-weight:bold"),
                            DateRangePickerDemo::create()
                        ]
                    ]),
                    Row::create([
                        [
                            Html::label("Select2")->style("font-weight:bold"),
                            Select2Demo::create()
                        ],
                        [
                            Html::label("Multiple Select2")->style("font-weight:bold"),
                            MultipleSelect2Demo::create(),
                        ]
                    ]),
                    Row::create([
                        [
                            Html::label("CheckBoxList")->style("font-weight:bold"),
                            CheckBoxListDemo::create()
                        ],
                        [
                            Html::label("RadioList")->style("font-weight:bold"),
                            RadioListDemo::create(),
                        ]
                    ]),
                    Row::create([
                        [
                            Html::label("TextArea")->style("font-weight:bold"),
                            TextAreaDemo::create(),
                        ]
                    ]),
                    ButtonDemo::create()
                ]),
                Panel::create()->type("success")->header("<b>Result</b>")->width(1/3)->sub([
                    Result::create("Result")
                ])
            ]),

            \demo\CodeDemo::create("
                This example shows you how to use input widgets to create dynamic dashboard.
                Inputs are special type of widget which receives inputs from user like text, click or menu selection
                and then transmits them to server to process.
                In above example, we show you the most used controls such as Text, Select, DateTimePicker etc.
            ")->raw(true)
        ];
    }
}