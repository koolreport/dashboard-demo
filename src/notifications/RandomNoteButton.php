<?php

namespace demo\notifications;

use koolreport\dashboard\inputs\Button;
use koolreport\dashboard\notifications\Note;

class RandomNoteButton extends Button
{
    protected function actionSubmit($request, $response) 
    {

        $notes = [
            Note::success("Your request has been done!","Congrats"),
            Note::warning("Becareful with this process, it is not revertible","Warning"),
            Note::danger("Something went wrong","Opps"),
        ];

        return $notes[rand(0,2)];
    }
}