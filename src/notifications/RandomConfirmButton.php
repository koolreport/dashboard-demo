<?php

namespace demo\notifications;

use koolreport\dashboard\inputs\Button;
use koolreport\dashboard\notifications\Confirm;

class RandomConfirmButton extends Button
{
    protected function actionSubmit($request, $response) 
    {
        $confirms = [
            Confirm::danger("Do you want to take this action?"),

            Confirm::warning("Are you sure to go ahead?")
                ->confirmButtonText("I am sure")
                ->onConfirm("alert('Thats brave!');")
                ->onCancel("alert('Coward');"),
            
                Confirm::success("Do you want to buy Bitcoin with 2010 price?")
                ->onConfirm("alert('Yes, you should be very rich now');")
                ->onCancel("alert('You miss chance to be rich');")
        ];

        return $confirms[rand(0,2)];
    }
}