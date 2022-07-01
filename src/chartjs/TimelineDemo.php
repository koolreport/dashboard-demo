<?php

namespace demo\chartjs;

use \koolreport\dashboard\widgets\chartjs\Timeline;
use \koolreport\dashboard\fields\Text;
use \koolreport\dashboard\fields\Currency;
use \koolreport\dashboard\ColorList;

use  \demo\AutoMaker;
use koolreport\dashboard\fields\Date;

class TimelineDemo extends Timeline
{
    protected function onInit()
    {
        $this->settings([
            "options"=>[
                "showText" => true,
                "textPadding" => 4,
                "colorScheme" => [
                    ['blue', 'red', 'green'],
                    ['00FFFF', 'rgba(0,255,0,0.3)']
                ],
                "backgroundOpacity" => 0.5,    
            ]
        ]);
    }

    protected function dataSource()
    {
        return [
            ["timelineLabel" => "Cool Graph", "itemLabel" => "Unknown", "start" => "2018-01-21", "end" => "2018-01-29"],
            ["timelineLabel" => "Heater", "itemLabel" => "On", "start" => "2018-01-22", "end" => "2018-01-23"],
            ["timelineLabel" => "Heater", "itemLabel" => "Off", "start" => "2018-01-24", "end" => "2018-01-26"],
            ["timelineLabel" => "Heater", "itemLabel" => "On", "start" => "2018-01-26", "end" => "2018-01-30"],
        ];
    }

    protected function fields()
    {
        return [
            Text::create("timelineLabel"),
            Date::create("start"),
            Date::create("end"),
            Text::create("itemLabel"),
        ];
    }
}