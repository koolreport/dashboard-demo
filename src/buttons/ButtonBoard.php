<?php

namespace demo\buttons;

use \koolreport\dashboard\Dashboard;

use \koolreport\dashboard\containers\Row;
use \koolreport\dashboard\containers\Panel;
use \koolreport\dashboard\containers\Inline;

use \koolreport\dashboard\inputs\Button;

class ButtonBoard extends Dashboard
{
    protected function content()
    {
        return [
            Row::create([
                Panel::create()->header("Button Types")->width(1/2)->sub([
                    Inline::create([
                        Button::create()->type("primary")
                            ->text("Primary"),
    
                        Button::create()->type("warning")
                            ->text("Warning")
                            ->attributes(["style"=>"margin-left:5px;"]),    
    
                        Button::create()->type("info")
                            ->text("Info")
                            ->attributes(["style"=>"margin-left:5px;"]),    
    
                        Button::create()->type("danger")
                            ->text("Danger")
                            ->attributes(["style"=>"margin-left:5px;"]),  
    
                        Button::create()->type("secondary")
                            ->text("Secondary")
                            ->attributes(["style"=>"margin-left:5px;"]),    
    
                    ])
                ]),
                Panel::create()->header("Button Outlines")->width(1/2)->sub([
                    Inline::create([
                        Button::create()->type("primary")->outline(true)
                            ->text("Primary"),
    
                        Button::create()->type("warning")->outline(true)
                            ->text("Warning")
                            ->attributes(["style"=>"margin-left:5px;"]),    
    
                        Button::create()->type("info")->outline(true)
                            ->text("Info")
                            ->attributes(["style"=>"margin-left:5px;"]),    
    
                        Button::create()->type("danger")->outline(true)
                            ->text("Danger")
                            ->attributes(["style"=>"margin-left:5px;"]),  
    
                        Button::create()->type("secondary")->outline(true)
                            ->text("Secondary")
                            ->attributes(["style"=>"margin-left:5px;"]),    
    
                    ])
                ]),    
            ]),
            Row::create([
                Panel::create()->header("Button Size")->width(1/2)->sub([
                    Inline::create([
                        Button::create()
                            ->text("Small")
                            ->size("sm"),
                        Button::create()
                            ->text("Medium")
                            ->size("md")
                            ->attributes(["style"=>"margin-left:5px;"]),    
                        Button::create()
                            ->text("Large")
                            ->size("lg")
                            ->attributes(["style"=>"margin-left:5px;"]),    
                    ])
                ]),
                Panel::create()->header("Button Disable")->width(1/2)->sub([
                    Inline::create([
                        Button::create()->type("primary")->disabled(true)
                            ->text("Primary"),
    
                        Button::create()->type("warning")->disabled(true)
                            ->text("Warning")
                            ->attributes(["style"=>"margin-left:5px;"]),    
    
                        Button::create()->type("info")->disabled(true)
                            ->text("Info")
                            ->attributes(["style"=>"margin-left:5px;"]),    
    
                        Button::create()->type("danger")->disabled(true)
                            ->text("Danger")
                            ->attributes(["style"=>"margin-left:5px;"]),  
    
                        Button::create()->type("secondary")->disabled(true)
                            ->text("Secondary")
                            ->attributes(["style"=>"margin-left:5px;"]),    
                    ])
                ]),
            ]),
            Row::create([
                Panel::create()->header("Block Level")->width(1/2)->sub([
                    Row::create([
                        Button::create()
                            ->type("primary")->blockLevel(true)
                            ->width(1/3),
                        Button::create()->blockLevel(true)
                            ->type("warning")
                            ->width(1/3),
                        Button::create()->blockLevel(true)
                            ->type("danger")
                            ->width(1/3),
                    ])
                ]),
                Panel::create()->header("Ladda Loading On Server-side action")->width(1/2)->sub([
                    Inline::create([
                        LaddaButton::create()
                            ->laddaStyle("expand-left")->text("expand-left")
                            ->type("primary")
                            ->width(1/3),
                        LaddaButton::create()
                            ->laddaStyle("expand-right")->text("expand-right")
                            ->type("warning")
                            ->width(1/3)
                            ->attributes(["style"=>"margin-left:5px;"]),
                        LaddaButton::create()
                            ->laddaStyle("expand-up")->text("expand-up")
                            ->type("danger")
                            ->width(1/3)
                            ->attributes(["style"=>"margin-left:5px;"]),
                        LaddaButton::create()
                            ->laddaStyle("expand-down")->text("expand-down")
                            ->type("success")
                            ->width(1/3)
                            ->attributes(["style"=>"margin-left:5px;"]),
                    ]),
                    Inline::create([
                        LaddaButton::create()
                            ->laddaStyle("contract")->text("contract")
                            ->type("primary")
                            ->width(1/3),
                        LaddaButton::create()
                            ->laddaStyle("contract-overlay")->text("contract-overlay")
                            ->type("warning")
                            ->width(1/3)
                            ->attributes(["style"=>"margin-left:5px;"]),
                        LaddaButton::create()
                            ->laddaStyle("zoom-in")->text("zoom-in")
                            ->type("danger")
                            ->width(1/3)
                            ->attributes(["style"=>"margin-left:5px;"]),
                        LaddaButton::create()
                            ->laddaStyle("zoom-out")->text("zoom-out")
                            ->type("success")
                            ->width(1/3)
                            ->attributes(["style"=>"margin-left:5px;"]),
                    ])->cssStyle("margin-top:10px"),
                    Inline::create([
                        LaddaButton::create()
                            ->laddaStyle("slide-left")->text("slide-left")
                            ->type("primary")
                            ->width(1/3),
                        LaddaButton::create()
                            ->laddaStyle("slide-right")->text("slide-right")
                            ->type("warning")
                            ->width(1/3)
                            ->attributes(["style"=>"margin-left:5px;"]),
                        LaddaButton::create()
                            ->laddaStyle("slide-up")->text("slide-up")
                            ->type("danger")
                            ->width(1/3)
                            ->attributes(["style"=>"margin-left:5px;"]),
                        LaddaButton::create()
                            ->laddaStyle("slide-down")->text("slide-down")
                            ->type("success")
                            ->width(1/3)
                            ->attributes(["style"=>"margin-left:5px;"]),
                    ])->cssStyle("margin-top:10px"),
                ]),
            ]),
            Row::create([
                Panel::create()->header("Custom onClick")->width(1/2)->sub([
                    Button::create()->text("Show Alert")
                        ->onClick("alert('Its working!')")
                ])
            ]),


            \demo\CodeDemo::create("
                This example shows you how to use Button inside your dashboard. There are alot of customizations to
                a button that you can do such as changing size, colors, activeness and the action will be taken when user
                clicks to a button. One of great features in the button is the laddaOnAction that shows loading on button's action.
            ")->raw(true)
        ];
    }
}