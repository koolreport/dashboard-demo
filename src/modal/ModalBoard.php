<?php

namespace demo\modal;

use \koolreport\dashboard\Dashboard;
use \koolreport\dashboard\containers\Row;
use \koolreport\dashboard\containers\Panel;
use \koolreport\dashboard\containers\Inline;
use \koolreport\dashboard\containers\Modal;

use \koolreport\dashboard\inputs\Button;

class ModalBoard extends Dashboard
{
    protected function content()
    {
        return [
            Row::create([
                Panel::create()->header("Modal sizes")->sub([
                    Inline::create([
                        Button::create()->text("Small Modal")
                            ->onClick(function(){
                                return Modal::show("smallModal");
                            }),
                        Button::create()->text("Medium Modal")
                            ->type("warning")
                            ->attributes(["style"=>"margin-left:5px"])
                            ->onClick(function(){
                                return Modal::show("mediumModal");
                            }),
                        Button::create()->text("Large Modal")
                            ->type("danger")
                            ->attributes(["style"=>"margin-left:5px"])
                            ->onClick(function(){
                                return Modal::show("largeModal");
                            }),
                    ]),
                    
                    //Small Modal
                    Modal::create("smallModal")->title("Small Modal")->sub([
                        \demo\googlecharts\LineChartDemo::create("smallLineChart")
                    ])
                    ->type("primary")
                    ->footer([
                        Button::create()->text("OK")->type("primary")->onClick(function(){
                            return Modal::hide("smallModal");
                        })
                    ])->size("sm"),
                    
                    //Medium Modal
                    Modal::create("mediumModal")->title("Medium Modal")->sub([
                        \demo\googlecharts\LineChartDemo::create("mediumLineChart")
                    ])
                    ->type("warning")
                    ->footer([
                        Button::create()->text("OK")->type("warning")->onClick(function(){
                            return Modal::hide("mediumModal");
                        })
                    ])->size("md"),
    
    
                    //Large Modal
                    Modal::create("largeModal")->title("Large Modal")->sub([
                        \demo\googlecharts\LineChartDemo::create("largeLineChart")
                    ])
                    ->type("danger")
                    ->footer([
                        Button::create()->text("OK")->type("danger")->onClick(function(){
                            return Modal::hide("largeModal");
                        })
                    ])->size("lg"),
                ])->width(1/2),

                Panel::create()->header("Open Modal from Server-side")->sub([
                    SubmitButton::create()->text("Open From Server")
                ])->width(1/2),
            ]),

            \demo\CodeDemo::create("
                This example shows you how to use modal, a pop up section to show detail data.
            ")->raw(true)
        ];
    }    
}