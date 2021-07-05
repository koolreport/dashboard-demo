<?php

namespace demo\customers;

use \koolreport\dashboard\widgets\Table;

use \demo\AutoMaker;

use \koolreport\dashboard\fields\Text;
use \koolreport\dashboard\fields\Number;
use \koolreport\dashboard\fields\Button;
use \koolreport\dashboard\Client;

class CustomerListTable extends Table
{
    protected function onCreated()
    {
        $this->pageSize(10)
        ->tableHover(true)
        ->tableStriped(true)
        ->searchable(true)
        ->searchAlign("right")
        ->searchWidth("300px");
    }

    protected function dataSource()
    {
        return AutoMaker::table("customers");
    }

    protected function fields()
    {
        return [
            Text::create("customerName")
                ->searchable(true),
            Text::create("country")
                ->searchable(true),
            Button::create("viewDetails")
                ->type("warning")
                ->textAlign("right")
                ->text("View Details")
                ->onClick(function($value, $row){
                    return Client::dashboard("CustomerDetailsBoard")->load([
                        "customerNumber"=>$row["customerNumber"]
                    ]);
                }),
        ];
    }
}