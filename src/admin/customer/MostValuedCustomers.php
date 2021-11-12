<?php

namespace demo\admin\customer;

use koolreport\dashboard\admin\glasses\Glass;
use koolreport\dashboard\fields\Currency;
use koolreport\dashboard\fields\ID;
use koolreport\dashboard\fields\Text;

class MostValuedCustomers extends Glass
{
    protected function onCreated()
    {
        $this->type("warning")
        ->icon("fa fa-users");
    }

    protected function query($query)
    {
        $query->join("payments","customers.customerNumber","=","payments.customerNumber")
            ->groupBy("customers.customerNumber")
            ->sum("amount")->alias("totalPayment")
            ->select("customers.customerNumber","customerName","country")
            ->orderBy("totalPayment","desc");    
        return $query;    
    }

    protected function fields()
    {
        return [
            ID::create("customerNumber")
                ->searchable(true)
                ->sortable(true),
            Text::create("customerName")
                ->searchable(true)
                ->sortable(true),
            Text::create("country")
                ->searchable(true)
                ->sortable(true),
            Currency::create("totalPayment")
                ->USD()->symbol()
        ];
    }
}