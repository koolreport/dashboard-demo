<?php

namespace demo\dropdown;
use \koolreport\dashboard\Dashboard;

use \koolreport\dashboard\containers\Row;
use \koolreport\dashboard\containers\Panel;
use \koolreport\dashboard\containers\Html;
use \koolreport\dashboard\containers\Inline;

use \koolreport\dashboard\menu\MenuItem;

use \koolreport\dashboard\inputs\Dropdown;

class DropdownBoard extends Dashboard
{
    protected function content()
    {
        return [
            Row::create([
                Panel::create()->header("Dropdown types")->sub([
                    Inline::create([
                        Dropdown::create("ddprimary")
                        ->type("primary")
                        ->title("Actions")->items([
                            "View details"=>MenuItem::create()->icon("fas fa-info-circle")->onClick(""),
                            "Export To PDF"=>MenuItem::create()->icon("far fa-file-pdf")->onClick(""),
                        ]),
                        Dropdown::create("ddsecondary")
                        ->type("secondary")
                        ->title("Actions")->items([
                            "View details"=>MenuItem::create()->icon("fas fa-info-circle")->onClick(""),
                            "Export To PDF"=>MenuItem::create()->icon("far fa-file-pdf")->onClick(""),
                        ]),
                        Dropdown::create("ddwarning")
                        ->type("warning")
                        ->title("Actions")->items([
                            "View details"=>MenuItem::create()->icon("fas fa-info-circle")->onClick(""),
                            "Export To PDF"=>MenuItem::create()->icon("far fa-file-pdf")->onClick(""),
                        ]),
                        Dropdown::create("ddinfo")
                        ->type("info")
                        ->title("Actions")->items([
                            "View details"=>MenuItem::create()->icon("fas fa-info-circle")->onClick(""),
                            "Export To PDF"=>MenuItem::create()->icon("far fa-file-pdf")->onClick(""),
                        ]),
                        Dropdown::create("ddsuccess")
                        ->type("success")
                        ->title("Actions")->items([
                            "View details"=>MenuItem::create()->icon("fas fa-info-circle")->onClick(""),
                            "Export To PDF"=>MenuItem::create()->icon("far fa-file-pdf")->onClick(""),
                        ]),
                        Dropdown::create("dddanger")
                        ->type("danger")
                        ->title("Actions")->items([
                            "View details"=>MenuItem::create()->icon("fas fa-info-circle")->onClick(""),
                            "Export To PDF"=>MenuItem::create()->icon("far fa-file-pdf")->onClick(""),
                        ]),
                    ])
                ]),
                Panel::create()->header("Outline dropdowns")->sub([
                    Inline::create([
                        Dropdown::create("ddprimaryoutline")
                        ->outline(true)
                        ->type("primary")
                        ->title("Actions")->items([
                            "View details"=>MenuItem::create()->icon("fas fa-info-circle")->onClick(""),
                            "Export To PDF"=>MenuItem::create()->icon("far fa-file-pdf")->onClick(""),
                        ]),
                        Dropdown::create("ddsecondaryoutline")
                        ->outline(true)
                        ->type("secondary")
                        ->title("Actions")->items([
                            "View details"=>MenuItem::create()->icon("fas fa-info-circle")->onClick(""),
                            "Export To PDF"=>MenuItem::create()->icon("far fa-file-pdf")->onClick(""),
                        ]),
                        Dropdown::create("ddwarningoutline")
                        ->outline(true)
                        ->type("warning")
                        ->title("Actions")->items([
                            "View details"=>MenuItem::create()->icon("fas fa-info-circle")->onClick(""),
                            "Export To PDF"=>MenuItem::create()->icon("far fa-file-pdf")->onClick(""),
                        ]),
                        Dropdown::create("ddinfooutline")
                        ->outline(true)
                        ->type("info")
                        ->title("Actions")->items([
                            "View details"=>MenuItem::create()->icon("fas fa-info-circle")->onClick(""),
                            "Export To PDF"=>MenuItem::create()->icon("far fa-file-pdf")->onClick(""),
                        ]),
                        Dropdown::create("ddsuccessoutline")
                        ->outline(true)
                        ->type("success")
                        ->title("Actions")->items([
                            "View details"=>MenuItem::create()->icon("fas fa-info-circle")->onClick(""),
                            "Export To PDF"=>MenuItem::create()->icon("far fa-file-pdf")->onClick(""),
                        ]),
                        Dropdown::create("dddangeroutline")
                        ->outline(true)
                        ->type("danger")
                        ->title("Actions")->items([
                            "View details"=>MenuItem::create()->icon("fas fa-info-circle")->onClick(""),
                            "Export To PDF"=>MenuItem::create()->icon("far fa-file-pdf")->onClick(""),
                        ]),
                    ])
                ]),
            ]),
            Row::create([
                Panel::create()->header("Block level")->sub([
                    Row::create([
                        Dropdown::create("ddinfoblocklevel")
                        ->blockLevel(true)
                        ->type("info")
                        ->title("Actions")->items([
                            "View details"=>MenuItem::create()->icon("fas fa-info-circle")->onClick(""),
                            "Export To PDF"=>MenuItem::create()->icon("far fa-file-pdf")->onClick(""),
                        ]),
                        Dropdown::create("ddsuccessblocklevel")
                        ->blockLevel(true)
                        ->type("success")
                        ->title("Actions")->items([
                            "View details"=>MenuItem::create()->icon("fas fa-info-circle")->onClick(""),
                            "Export To PDF"=>MenuItem::create()->icon("far fa-file-pdf")->onClick(""),
                        ]),
                        Dropdown::create("dddangerblocklevel")
                        ->blockLevel(true)
                        ->type("danger")
                        ->title("Actions")->items([
                            "View details"=>MenuItem::create()->icon("fas fa-info-circle")->onClick(""),
                            "Export To PDF"=>MenuItem::create()->icon("far fa-file-pdf")->onClick(""),
                        ]),
                    ])
                ]),
                Panel::create()->header("Sizes")->sub([
                    Inline::create([
                        Dropdown::create("ddprimarysm")
                        ->size("sm")
                        ->type("primary")
                        ->title("Actions")->items([
                            "View details"=>MenuItem::create()->icon("fas fa-info-circle")->onClick(""),
                            "Export To PDF"=>MenuItem::create()->icon("far fa-file-pdf")->onClick(""),
                        ]),
                        Dropdown::create("ddprimarymd")
                        ->size("md")
                        ->type("primary")
                        ->title("Actions")->items([
                            "View details"=>MenuItem::create()->icon("fas fa-info-circle")->onClick(""),
                            "Export To PDF"=>MenuItem::create()->icon("far fa-file-pdf")->onClick(""),
                        ]),
                        Dropdown::create("ddprimarylg")
                        ->size("lg")
                        ->type("primary")
                        ->title("Actions")->items([
                            "View details"=>MenuItem::create()->icon("fas fa-info-circle")->onClick(""),
                            "Export To PDF"=>MenuItem::create()->icon("far fa-file-pdf")->onClick(""),
                        ]),
                    ])
                ])
            ]),
            Row::create([
                Panel::create()->header("Alignment")->sub([
                    Inline::create([
                        Dropdown::create("dddangerleft")
                        ->align("left")
                        ->type("danger")
                        ->title("Left-align menu")->items([
                            "View details"=>MenuItem::create()->icon("fas fa-info-circle")->onClick(""),
                            "Export To PDF"=>MenuItem::create()->icon("far fa-file-pdf")->onClick(""),
                        ]),
                        Dropdown::create("ddsuccessright")
                        ->align("right")
                        ->type("success")
                        ->title("Right-align menu")->items([
                            "View details"=>MenuItem::create()->icon("fas fa-info-circle")->onClick(""),
                            "Export To PDF"=>MenuItem::create()->icon("far fa-file-pdf")->onClick(""),
                        ]),
                    ])
                ]),
                Panel::create()->header("Disabled")->sub([
                    Inline::create([
                        Dropdown::create("ddprimary")
                        ->disabled(true)
                        ->type("primary")
                        ->title("Actions")->items([
                            "View details"=>MenuItem::create()->icon("fas fa-info-circle")->onClick(""),
                            "Export To PDF"=>MenuItem::create()->icon("far fa-file-pdf")->onClick(""),
                        ]),
                        Dropdown::create("ddsecondary")
                        ->disabled(true)
                        ->type("secondary")
                        ->title("Actions")->items([
                            "View details"=>MenuItem::create()->icon("fas fa-info-circle")->onClick(""),
                            "Export To PDF"=>MenuItem::create()->icon("far fa-file-pdf")->onClick(""),
                        ]),
                        Dropdown::create("ddwarning")
                        ->disabled(true)
                        ->type("warning")
                        ->title("Actions")->items([
                            "View details"=>MenuItem::create()->icon("fas fa-info-circle")->onClick(""),
                            "Export To PDF"=>MenuItem::create()->icon("far fa-file-pdf")->onClick(""),
                        ]),    
                    ])
                ]),
            ]),
            Panel::create()->header("Real example")->sub([
                StatusDropdown::create()
                    ->cssStyle("margin-bottom:5px;")
                    ->cssClass("text-right"),
                OrderTable::create(),
            ]),

            \demo\CodeDemo::create("
                Dropdown provide you with a small button which brings a list of actions (menu items) when clicked.
                Dropdown can act as a small menu of actions for your another widget. Dropdown is very flexible in term of
                apperance such as sizes, shapes etc. In above examples, we bring you the features of dropdown as well as
                a real-life use case of it. On selection of Order Status, the table will bring out the orders with chosen status.
                The color of dropdown and text will be changed according to status selected.
            ")->raw(true)
        ];
    }
}