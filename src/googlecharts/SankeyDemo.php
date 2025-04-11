<?php

namespace demo\googlecharts;

use \koolreport\dashboard\widgets\google\Sankey;

class SankeyDemo extends Sankey
{
    protected function onInit()
    {
        $this->height("360px");
    }

    protected function dataSource()
    {
        return [
            ['A', 'X', 5],
            ['A', 'Y', 7],
            ['A', 'Z', 6],
            ['B', 'X', 2],
            ['B', 'Y', 9],
            ['B', 'Z', 4]
        ];
    }

    protected function fields() {}
}
