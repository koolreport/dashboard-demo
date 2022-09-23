<?php

namespace demo\validators;

use koolreport\dashboard\containers\Html;
use koolreport\dashboard\containers\Panel;
use koolreport\dashboard\containers\Row;
use koolreport\dashboard\Dashboard;
use koolreport\dashboard\inputs\Button;
use koolreport\dashboard\inputs\TextBox;
use koolreport\dashboard\notifications\Alert;
use koolreport\dashboard\validators\RangeValidator;
use koolreport\dashboard\validators\RequiredFieldValidator;
use koolreport\dashboard\validators\ValidationGroup;

class ValidatorBoard extends Dashboard
{
    protected function content()
    {
        return [
            Row::create([
                Panel::warning([
                    //Name
                    Html::label("Name")->class("font-weight-bold mt-2"),
                    TextBox::create("name")
                    ->placeHolder("Name is required"),
                    RequiredFieldValidator::create("nameRequired")
                        ->inputToValidate("name")
                        ->errorMessage("* Name is stricly required")
                        ->validationGroup("vaGroup"),
                    
                    //Age
                    Html::label("Age")->class("font-weight-bold mt-2"),
                    TextBox::create("age")
                        ->placeHolder("Age from 15 to 45"),
                    RangeValidator::create("ageRange")
                        ->inputToValidate("age")
                        ->min(15)
                        ->max(45)
                        ->errorMessage("* Age must be from 15 to 45")
                        ->validationGroup("vaGroup"),

                    //Group the validator for easy access
                    ValidationGroup::create("vaGroup"),

                    //Submit
                    Button::create("submit")
                        ->cssClass("mt-2")
                        ->action("submit",function(){
                            //Keep form validator updated in all cases
                            $this->sibling("vaGroup")->update();
                            
                            //Validate and if all is correct then take action
                            if($this->sibling("vaGroup")->validate()->isValid()) {
                                $name = htmlentities($this->sibling("name")->value());
                                $age = htmlentities($this->sibling("age")->value());
                                //Open alert to show that form is correct
                                return Alert::success("Form is well input and the result is ['$name','$age']","Correct");
                            }
                        })
                ])
                ->width(1/2)
                ->header(Html::b("Validated Form"))        
            ]),
            \demo\CodeDemo::create("
                This example show you how to make a validated form in dashboard. The name input is required and age
                input is required between range of 15 to 45.
            ")->raw(true)
        ];
    }
}