<?php

namespace demo\detailmodal;

use \koolreport\dashboard\containers\Modal;

use \koolreport\dashboard\widgets\d3\DonutChart;
use \koolreport\dashboard\fields\Text;
use \koolreport\dashboard\fields\Currency;
use \koolreport\dashboard\inputs\Button;


class RevenueCustomDetail extends Revenue
{
    protected function detailModal($params=[])
    {
        $modal = Modal::create();
        $dataView = $this->dataView();
        return $modal
        ->title("AutoMaker's Revenue in 2022")
        ->type("warning")
        ->size("lg")
        ->sub([
            DonutChart::create("revenueInDonut")
            ->dataSource($dataView->data())
            ->fields([
                Text::create("month"),
                Currency::create("total")
                    ->USD()->symbol()
                    ->decimals(0),
            ])
        ])            
        ->footer([
            Button::create()
                ->text("Done")
                ->type("default")
                ->onClick(Modal::hide($modal))
        ]);
    }
}