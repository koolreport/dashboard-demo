<?php

namespace demo\panel;

use \koolreport\dashboard\Dashboard;

use \koolreport\dashboard\containers\Row;
use \koolreport\dashboard\containers\Panel;
use \koolreport\dashboard\widgets\Text;
use \koolreport\dashboard\menu\MenuItem;


class PanelBoard extends Dashboard
{
    protected function widgets()
    {
        return [
            Row::create([
                Panel::create()->width(1/4)->sub([
                    Text::create()->text("Panel with no header footer, a pure white board for your creativity!")
                ]),
                Panel::create()->width(1/4)->header("Header")->sub([
                    Text::create()->text("Panel with header, you can insert any html to the header")
                ]),
                Panel::create()->width(1/4)->footer("Footer")->sub([
                    Text::create()->text("Panel with footer")
                ]),
                Panel::create()->width(1/4)
                    ->header("Header")
                    ->footer("Footer")
                    ->sub([
                    Text::create()->text("Panel with both header and footer")
                    ]),
            ]),
            Row::create([
                Panel::create()->width(1/4)->header("Primary")->type("primary")->sub([
                    Text::create()->text("Panel with type")
                ]),
                Panel::create()->width(1/4)->header("Success")->type("success")->sub([
                    Text::create()->text("Panel with type")
                ]),
                Panel::create()->width(1/4)->header("Warning")->type("warning")->sub([
                    Text::create()->text("Panel with type")
                ]),
                Panel::create()->width(1/4)->header("Danger")->type("danger")->sub([
                    Text::create()->text("Panel with type")
                ]),
            ]),
            Row::create([
                Panel::create()->width(1/2)->header("With menu")->type("primary")->sub([
                    Text::create()->text("Panel with menu")
                ])
                ->menu([
                    "Option 1"=>MenuItem::create()->icon("far fa-hand-point-right"),
                    "Option 2"=>MenuItem::create()->icon("far fa-hand-point-right"),
                    "Option 3"=>MenuItem::create()->icon("far fa-hand-point-right"),
                ]),
                Panel::create()->width(1/2)->header("With menu")->type("warning")->sub([
                    Text::create()->text("Panel with menu")
                ])
                ->menu([
                    "Option 1"=>MenuItem::create()->icon("far fa-hand-point-right"),
                    "Option 2"=>MenuItem::create()->icon("far fa-hand-point-right"),
                    "Option 3"=>MenuItem::create()->icon("far fa-hand-point-right"),
                ]),
            ]),
            Row::create([
                Panel::create()
                ->width(1/3)
                ->cssClass("bg-primary text-white text-center")
                ->sub([
                    Text::create()
                        ->text("Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante. <br/><br/> Someone famous in <i>Source Title</i>")
                        ->asHtml(true)
                ]),
                Panel::create()
                ->width(1/3)
                ->cssClass("bg-success text-white text-center")
                ->sub([
                    Text::create()
                        ->text("Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante. <br/><br/> Someone famous in <i>Source Title</i>")
                        ->asHtml(true)
                ]),
                Panel::create()
                ->width(1/3)
                ->cssClass("bg-info text-white text-center")
                ->sub([
                    Text::create()
                        ->text("Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante. <br/><br/> Someone famous in <i>Source Title</i>")
                        ->asHtml(true)
                ]),
                Panel::create()
                ->width(1/3)
                ->cssClass("bg-warning text-white text-center")
                ->sub([
                    Text::create()
                        ->text("Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante. <br/><br/> Someone famous in <i>Source Title</i>")
                        ->asHtml(true)
                ]),
                Panel::create()
                ->width(1/3)
                ->cssClass("bg-danger text-white text-center")
                ->sub([
                    Text::create()
                        ->text("Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante. <br/><br/> Someone famous in <i>Source Title</i>")
                        ->asHtml(true)
                ]),
                Panel::create()
                ->width(1/3)
                ->cssClass("bg-secondary text-white text-center")
                ->sub([
                    Text::create()
                        ->text("Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante. <br/><br/> Someone famous in <i>Source Title</i>")
                        ->asHtml(true)
                ]),
            ]),
            Row::create([
                Panel::create()
                ->width(1/3)
                ->header("Panel title")
                ->cssClass("bg-primary text-white")
                ->sub([
                    Text::create()->text("Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat.")
                ]),
                Panel::create()
                ->width(1/3)
                ->header("Panel title")
                ->cssClass("bg-success text-white")
                ->sub([
                    Text::create()->text("Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat.")
                ]),
                Panel::create()
                ->width(1/3)
                ->header("Panel title")
                ->cssClass("bg-info text-white")
                ->sub([
                    Text::create()->text("Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat.")
                ]),
                Panel::create()
                ->width(1/3)
                ->header("Panel title")
                ->cssClass("bg-warning text-white")
                ->sub([
                    Text::create()->text("Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat.")
                ]),
                Panel::create()
                ->width(1/3)
                ->header("Panel title")
                ->cssClass("bg-danger text-white")
                ->sub([
                    Text::create()->text("Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat.")
                ]),
                Panel::create()
                ->width(1/3)
                ->header("Panel title")
                ->cssClass("bg-secondary text-white")
                ->sub([
                    Text::create()->text("Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat.")
                ]),
            ])
        ];
    }
}