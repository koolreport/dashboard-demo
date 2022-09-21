<?php

namespace demo\notifications;

use koolreport\dashboard\containers\Inline;
use koolreport\dashboard\containers\Panel;
use koolreport\dashboard\Dashboard;

class NotificationBoard extends Dashboard
{
    protected function content()
    {
        return [
            Panel::primary([
                Inline::create([
                    RandomAlertButton::primary("Show alerts"),
                    RandomConfirmButton::warning("Show confirms"),
                    RandomNoteButton::success("Show notes"),
                ])
            ])
            ->header("Notifications"),

            \demo\CodeDemo::create("
                This example shows you how to show type of notifications: Alert, Confirm and Note.
                The notification object is returned in action method of dashboard or widget.
            ")->raw(true)
        ];
    }
}