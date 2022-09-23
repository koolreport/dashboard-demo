<?php

namespace demo\toggle;
use \koolreport\dashboard\Dashboard;

use \koolreport\dashboard\containers\Row;
use \koolreport\dashboard\containers\Panel;
use \koolreport\dashboard\containers\Inline;

use \koolreport\dashboard\inputs\Toggle;
use \koolreport\dashboard\containers\Html;

class ToggleBoard extends Dashboard
{
    protected function content()
    {
        return [
            Row::create([
                Panel::create()->header("3D Toggles")->width(1/2)->sub([
                    Inline::create([
                        Toggle::create("toggle3d_primary")
                            ->defaultValue(1)
                            ->cssStyle("margin-left:5px")
                            ->is3D(true)
                            ->type("primary"),
                        Toggle::create("toggle3d_secondary")
                            ->defaultValue(1)
                            ->cssStyle("margin-left:5px")
                            ->is3D(true)
                            ->type("secondary"),
                        Toggle::create("toggle3d_danger")
                            ->defaultValue(1)
                            ->cssStyle("margin-left:5px")
                            ->is3D(true)
                            ->type("danger"),
                        Toggle::create("toggle3d_warning")
                            ->defaultValue(1)
                            ->cssStyle("margin-left:5px")
                            ->is3D(true)
                            ->type("warning"),
                        Toggle::create("toggle3d_success")
                            ->defaultValue(1)
                            ->cssStyle("margin-left:5px")
                            ->is3D(true)
                            ->type("success"),
                    ])
                ]),
                Panel::create()->header("Pills")->width(1/2)->sub([
                    Inline::create([
                        Toggle::create("pill_primary")
                            ->defaultValue(1)
                            ->cssStyle("margin-left:5px")
                            ->pill(true)
                            ->type("primary"),
                        Toggle::create("pill_secondary")
                            ->defaultValue(1)
                            ->cssStyle("margin-left:5px")
                            ->pill(true)
                            ->type("secondary"),
                        Toggle::create("pill_danger")
                            ->defaultValue(1)
                            ->cssStyle("margin-left:5px")
                            ->pill(true)
                            ->type("danger"),
                        Toggle::create("pill_warning")
                            ->defaultValue(1)
                            ->cssStyle("margin-left:5px")
                            ->pill(true)
                            ->type("warning"),
                        Toggle::create("pill_success")
                            ->defaultValue(1)
                            ->cssStyle("margin-left:5px")
                            ->pill(true)
                            ->type("success"),
                    ])
                ]),
            ]),

            Row::create([
                Panel::create()->header("Default")->width(1/2)->sub([
                    Inline::create([
                        Toggle::create("default_primary")
                            ->defaultValue(1)
                            ->cssStyle("margin-left:5px")
                            ->type("primary"),
                        Toggle::create("default_secondary")
                            ->defaultValue(1)
                            ->cssStyle("margin-left:5px")
                            ->type("secondary"),
                        Toggle::create("default_danger")
                            ->defaultValue(1)
                            ->cssStyle("margin-left:5px")
                            ->type("danger"),
                        Toggle::create("default_warning")
                            ->defaultValue(1)
                            ->cssStyle("margin-left:5px")
                            ->type("warning"),
                        Toggle::create("default_success")
                            ->defaultValue(1)
                            ->cssStyle("margin-left:5px")
                            ->type("success"),
                    ])
                ]),
                Panel::create()->header("Outline")->width(1/2)->sub([
                    Inline::create([
                        Toggle::create("outline_primary")
                            ->defaultValue(1)
                            ->cssStyle("margin-left:5px")
                            ->outline(true)
                            ->type("primary"),
                        Toggle::create("outline_secondary")
                            ->defaultValue(1)
                            ->cssStyle("margin-left:5px")
                            ->outline(true)
                            ->type("secondary"),
                        Toggle::create("outline_danger")
                            ->defaultValue(1)
                            ->cssStyle("margin-left:5px")
                            ->outline(true)
                            ->type("danger"),
                        Toggle::create("outline_warning")
                            ->defaultValue(1)
                            ->cssStyle("margin-left:5px")
                            ->outline(true)
                            ->type("warning"),
                        Toggle::create("outline_success")
                            ->defaultValue(1)
                            ->cssStyle("margin-left:5px")
                            ->outline(true)
                            ->type("success"),
                    ])
                ])
            ]),

            Row::create([
                Panel::create()->header("Toggle with text")->width(1/2)->sub([
                    Inline::create([
                        Toggle::create("text_primary")
                            ->defaultValue(1)
                            ->cssStyle("margin-left:5px")
                            ->showText(true)
                            ->type("primary"),
                        Toggle::create("text_secondary")
                            ->defaultValue(1)
                            ->cssStyle("margin-left:5px")
                            ->showText(true)
                            ->type("secondary"),
                        Toggle::create("text_danger")
                            ->defaultValue(1)
                            ->cssStyle("margin-left:5px")
                            ->showText(true)
                            ->type("danger"),
                        Toggle::create("text_warning")
                            ->defaultValue(1)
                            ->cssStyle("margin-left:5px")
                            ->showText(true)
                            ->type("warning"),
                        Toggle::create("text_success")
                            ->defaultValue(1)
                            ->cssStyle("margin-left:5px")
                            ->showText(true)
                            ->type("success"),
                    ])
                ]),
                Panel::create()->header("Toggle outline with text")->width(1/2)->sub([
                    Inline::create([
                        Toggle::create("default_primary")
                            ->defaultValue(1)
                            ->cssStyle("margin-left:5px")
                            ->showText(true)
                            ->outline(true)
                            ->type("primary"),
                        Toggle::create("default_secondary")
                            ->defaultValue(1)
                            ->cssStyle("margin-left:5px")
                            ->showText(true)
                            ->outline(true)
                            ->type("secondary"),
                        Toggle::create("default_danger")
                            ->defaultValue(1)
                            ->cssStyle("margin-left:5px")
                            ->showText(true)
                            ->outline(true)
                            ->type("danger"),
                        Toggle::create("default_warning")
                            ->defaultValue(1)
                            ->cssStyle("margin-left:5px")
                            ->showText(true)
                            ->outline(true)
                            ->type("warning"),
                        Toggle::create("default_success")
                            ->defaultValue(1)
                            ->cssStyle("margin-left:5px")
                            ->showText(true)
                            ->outline(true)
                            ->type("success"),
                    ])
                ])
            ]),
            Row::create([
                Panel::create()->header("Toggle with action")->sub([
                    Inline::create([
                        InProcessToggle::create(),
                        Html::span("Only In-Process Orders")
                    ]),
                    OrderTable::create()
                ])
            ]),
            \demo\CodeDemo::create("
                Toggle is a simple selection with 2 states: ON and OFF. Although very small but it is very convenient
                to turn on or turn off a condition in dashboard. Above example show you how to customize Toggle button
                and also how to use it in real life example.
            ")->raw(true)
        ];
    }
}