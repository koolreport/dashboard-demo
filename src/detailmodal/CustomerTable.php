<?php

namespace demo\detailmodal;

use \koolreport\dashboard\widgets\Table;

use \demo\AutoMaker;

use \koolreport\dashboard\fields\Text;
use \koolreport\dashboard\fields\Number;
use \koolreport\dashboard\fields\Button as ButtonField;

use \koolreport\dashboard\Client;
use \koolreport\dashboard\containers\Html;
use \koolreport\dashboard\inputs\Button;
use \koolreport\dashboard\containers\Modal;


class CustomerTable extends Table
{
    protected function onCreated()
    {
        $this
        ->detailShowable(true)
        ->pageSize(5)
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
            ButtonField::create("viewDetails")
                ->type("warning")
                ->textAlign("right")
                ->text("View Orders")
                ->onClick(function($value, $row){
                    return Client::widget($this->widget())->showDetail([
                        "customerNumber"=>$row["customerNumber"],
                        "customerName"=>$row["customerName"],
                    ]);
                }),
        ];
    }

    protected function detailModal($params=[])
    {
        $modal = Modal::create();
        return $modal
        ->title($params["customerName"])
        ->type("info")
        ->size("lg")
        ->sub([
            OrderDetailsTable::create()->params($params)
        ])
        ->footer([
            Button::create()
                ->text("Done")
                ->type("default")
                ->onClick(Modal::hide($modal))
        ]);
    }
}