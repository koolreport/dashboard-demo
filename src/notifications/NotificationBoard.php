<?php

namespace demo\notifications;

use koolreport\dashboard\containers\Inline;
use koolreport\dashboard\containers\Panel;
use koolreport\dashboard\Dashboard;

class NotificationBoard extends Dashboard
{
    protected function widgets()
    {
        return [
            Panel::primary([
                Inline::create([
                    RandomAlertButton::primary("Show alerts"),
                    RandomConfirmButton::warning("Show confirms"),
                    RandomNoteButton::success("Show notes"),
                ])
            ])
            ->header("Notifications")
        ];
    }
}