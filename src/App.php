<?php

namespace dashboard;

class App extends \koolreport\dashboard\Application 
{
    protected function dashboards() {
        return [
            "Home"=>Home::create()
        ];
    }
}