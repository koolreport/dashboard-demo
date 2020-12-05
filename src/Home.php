<?php

namespace dashboard;
use \koolreport\dashboard\containers\Row;


class Home extends \koolreport\dashboard\Dashboard
{
    protected function widgets()
    {
        return [
            Row::create()->sub([
                \koolreport\dashboard\inputs\Button::create()->text("abc"),
                \koolreport\dashboard\inputs\Button::create(),
            ])
            
            
        ];
    }    
}