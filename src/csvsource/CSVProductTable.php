<?php

namespace demo\csvsource;

use \koolreport\dashboard\widgets\Table;
use \koolreport\dashboard\sources\CSV;
use \koolreport\dashboard\fields\Text;
use \koolreport\dashboard\fields\Number;
use \koolreport\dashboard\fields\Currency;


class CSVProductTable extends Table
{
    protected function onCreated()
    {
        $this->pageSize(10);
    }

    protected function dataSource()
    {
        return CSV::file("data/products.csv")
                ->fieldSeparator("|")
                ->select("productCode","productName","productVendor","quantityInStock","buyPrice")
                ->where("quantityInStock",">",5000);
    }

    protected function fields()
    {
        return [
            Text::create("productCode"),
            Text::create("productName"),
            Text::create("productVendor"),
            Number::create("quantityInStock")
                ->suffix(" units"),
            Currency::create("buyPrice")->USD()->symbol()->decimals(2),
        ];
    }
}