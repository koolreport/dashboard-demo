<?php

namespace demo\admin\customer;

use demo\AdminAutoMaker;
use koolreport\dashboard\admin\filters\MultiSelect2Filter;

class CountryFilter extends MultiSelect2Filter
{
    protected function apply($query, $countries)
    {
        $query->whereIn("country",$countries);
        return $query;
    }

    protected function options()
    {
        return AdminAutoMaker::table("customers")
                ->select("country")
                ->distinct();
    }
}