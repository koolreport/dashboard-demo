<?php

namespace demo\admin\customer;

use koolreport\dashboard\admin\filters\ToggleFilter;

class HighCreditFilter extends ToggleFilter
{
    protected function apply($query, $bool)
    {
        $query->where("creditLimit",">",120000);
        return $query;
    }
}