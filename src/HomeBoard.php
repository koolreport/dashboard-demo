<?php

namespace demo;
use \koolreport\dashboard\containers\Row;
use \koolreport\dashboard\containers\Panel;

class HomeBoard extends \koolreport\dashboard\Dashboard
{
    protected function widgets()
    {
        return [
            Row::create()->sub([
            ])            
        ];
    }    
}