<?php

namespace demo\products;

use \koolreport\dashboard\Dashboard;

use \koolreport\dashboard\containers\Row;
use \koolreport\dashboard\containers\Panel;
use \koolreport\dashboard\widgets\Text;
use \koolreport\dashboard\widgets\StateHolder;

class ProductBoard extends Dashboard
{

    protected function widgets()
    {
        return [
            Text::create("<h1>Product Stock</h1>")->asHtml(true),
            Row::create()->sub([
                Panel::create()
                ->header("<b>Product By Line</b>")
                ->type("primary")
                ->sub([
                    ProductByLine::create(),
                ])->width(1/3),
                
                Panel::create()
                ->header("<b>Product List</b>")
                ->type("warning")
                ->sub([
                    ProductTable::create(),
                ])
            ]),
            // StateHolder::create(),            
        ];
    }
}