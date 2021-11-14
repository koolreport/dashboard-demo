<?php

namespace demo\notifications;

use koolreport\dashboard\inputs\Button;
use koolreport\dashboard\notifications\Alert;

class RandomAlertButton extends Button
{
    protected function actionSubmit($request, $response) 
    {

        $alerts = [
            Alert::success("Your request has been done!","Congrats"),
            Alert::danger("Something went wrong","Opps")
                ->confirmButtonText("I understand"),
        ];

        return $alerts[rand(0,1)];
    }
}