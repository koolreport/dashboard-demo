<?php

namespace demo\inputs;

use \koolreport\dashboard\Dashboard;
use \koolreport\dashboard\containers\Row;
use \koolreport\dashboard\containers\Panel;
use \koolreport\dashboard\Container;

use \koolreport\dashboard\widgets\Text;



class InputsBoard extends Dashboard
{
    protected function widgets()
    {
        return [
            Row::create([
                Panel::create()->type("primary")->header("<b>Input Sample</b>")->width(2/3)->sub([
                    Row::create([
                        [
                            Text::create()->text("<label><strong>TextBox</strong></label>")->asHtml(true),
                            TextBoxDemo::create()
                        ],
                        [
                            Text::create()->text("<label><strong>Select</strong></label>")->asHtml(true),
                            SelectDemo::create()
                        ]
                    ]),
                    Row::create([
                        [
                            Text::create()->text("<label><strong>DateTimePicker</strong></label>")->asHtml(true),
                            DateTimePickerDemo::create()
                        ],
                        [
                            Text::create()->text("<label><strong>DateRangePicker</strong></label>")->asHtml(true),
                            DateRangePickerDemo::create()
                        ]
                    ]),
                    Row::create([
                        [
                            Text::create()->text("<label><strong>Select2</strong></label>")->asHtml(true),
                            Select2Demo::create()
                        ],
                        [
                            Text::create()->text("<label><strong>Multiple Select2</strong></label>")->asHtml(true),
                            MultipleSelect2Demo::create(),
                        ]
                    ]),
                    Row::create([
                        [
                            Text::create()->text("<label><strong>CheckBoxList</strong></label>")->asHtml(true),
                            CheckBoxListDemo::create()
                        ],
                        [
                            Text::create()->text("<label><strong>RadioList</strong></label>")->asHtml(true),
                            RadioListDemo::create(),
                        ]
                    ]),
                ]),
                Panel::create()->type("success")->header("<b>Result</b>")->width(1/3)->sub([
                    Result::create("Result")
                ])
            ])
        ];
    }
}