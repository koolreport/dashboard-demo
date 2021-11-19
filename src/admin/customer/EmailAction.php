<?php

namespace demo\admin\customer;

use koolreport\dashboard\admin\actions\Action;
use koolreport\dashboard\inputs\TextArea;
use koolreport\dashboard\inputs\TextBox;
use koolreport\dashboard\notifications\Note;
use koolreport\dashboard\validators\RequiredFieldValidator;

class EmailAction extends Action
{
    protected function onCreated()
    {
        $this->title("Email")
        ->type("warning")
        ->icon("far fa-envelope");
    }

    protected function handle($form, $models)
    {
        $subject = $form->input("subject")->value();
        $content = $form->input("content")->value();

        // In real applications, we will send email here
        // We fake sending email and show notification

        $numberOfPersons = $models->count();
        if($numberOfPersons==1) {
            return Note::success("The email has been sent to <b>".$models->get(0,"customerName")."</b>","Email sent!");
        }
        return Note::success("Has emailed to $numberOfPersons persons","Email sent!");
    }

    protected function form()
    {
        return Action::modalForm([
            "Subject"=>TextBox::create("subject")->placeHolder("Subject"),
            "Content"=>TextArea::create("content")->placeHolder("Content"),
        ])
        ->validators([
            //Subject required validation
            RequiredFieldValidator::create()
                ->inputToValidate("subject")
                ->errorMessage("* Subject is required"),
                
            //Content required validation
            RequiredFieldValidator::create()
                ->inputToValidate("content")
                ->errorMessage("* Content can not be empty"),
        ])
        ->confirmButtonText("Send");
    }
}