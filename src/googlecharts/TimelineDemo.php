<?php

namespace demo\googlecharts;

use \koolreport\dashboard\widgets\google\Timeline;
use \koolreport\dashboard\fields\Text;

use koolreport\dashboard\fields\Date;

class TimelineDemo extends Timeline
{
    protected function onInit() {}

    protected function dataSource()
    {
        return [
            ['President', 'Start', 'End'],
            ['Gerald Ford',  "1974-01-20",  "1977-01-20"],
            ['Jimmy Carter',  "1977-01-20",  "1981-01-20"],
            ['Ronald Reagan',  "1981-01-20",  "1989-01-20"],
            ['George H. W. Bush',  "1989-01-20",  "1993-01-20"],
            ['Bill Clinton',  "1993-01-20",  "2001-01-20"],
            ['George W. Bush',  "2001-01-20",  "2009-01-20"],
            ['Barack Obama',  "2009-01-20",  "2017-01-20"],
            ['Donald Trump',  "2017-01-20",  date("Y-m-d")]
        ];
    }

    protected function fields()
    {
        return [
            Text::create("President"),
            Date::create("Start"),
            Date::create("End"),
        ];
    }
}
