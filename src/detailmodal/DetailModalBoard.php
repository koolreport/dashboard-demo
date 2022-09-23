<?php

namespace demo\detailmodal;

use \koolreport\dashboard\Dashboard;
use \koolreport\dashboard\containers\Row;
use \koolreport\dashboard\containers\Panel;
use \koolreport\dashboard\containers\Html;
use \koolreport\dashboard\Client;
use \koolreport\dashboard\inputs\Button;

use \demo\AutoMaker;
use \koolreport\dashboard\containers\Modal;



class DetailModalBoard extends Dashboard
{
    protected function content()
    {
        return [
            Row::create([
                Panel::create()->header("<b>Default Detail Modal</b>")->width(1/2)->sub([
                    Html::div()->class("text-right")->sub([
                        Button::create()->text("View Data")
                            ->laddaOnAction(true)
                            ->onClick(
                                Client::widget("Revenue")->showDetail()
                            )
                    ]),
                    Revenue::create()->detailShowable(true)
                ]),
                Panel::create()->header("<b>Custom Detail Modal</b>")->width(1/2)->sub([
                    Html::div()->class("text-right")->sub([
                        Button::create()->text("Revenue Comparison")
                            ->type("warning")
                            ->laddaOnAction(true)
                            ->onClick(
                                Client::widget("RevenueCustomDetail")->showDetail()
                            )
                    ]),
                    RevenueCustomDetail::create()->detailShowable(true)
                ])    
            ]),
            Row::create([
                Panel::create()->header(Html::b("Master Details"))->sub([
                    CustomerTable::create()
               ])
            ]),

            \demo\CodeDemo::create("
                DetailModal is a special feature of most widgets. By default, detail modal allows us to see behind data
                of widget in a table form. However, the detail modal can be customized to show anything. In above example,
                we use detail modal to show revenue comparizon in DonutChart. Also, we customize detail modal to show
                customer detail information.
            ")->raw(true)
        ];
    }
}