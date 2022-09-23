<?php

namespace demo\table;

use \koolreport\dashboard\Dashboard;

use \koolreport\dashboard\containers\Row;
use \koolreport\dashboard\containers\Panel;
use \koolreport\dashboard\containers\Html;

class TableBoard extends Dashboard
{
    protected function content()
    {
        return [
            Panel::create()->type("primary")->header("Basic Columns")->sub([
                BasicColumnsTable::create()->lazyLoading(true)
            ]),
            Row::create()->sub([
                Panel::create()->type("warning")->header("Paginated Table")->width(1/2)->sub([
                    PaginatedTable::create()->lazyLoading(true)
                ]),
                Panel::create()->type("warning")->header("Styled Table")->width(1/2)->sub([
                    StyledTable::create()->lazyLoading(true),
                    Html::p([
                        Html::b("Note: "),
                        "Show small table with light header, stripped rows, bordered, outlined and row hovering"
                    ])
                ]),
            ]),
            Row::create()->sub([
                Panel::create()->type("danger")->header("Show Footer & Column Aggregation")->width(1/2)->sub([
                    WithFooterTable::create()->lazyLoading(true)
                ]),
                Panel::create()->type("danger")->header("Align Column Text")->width(1/2)->sub([
                    ColumnAlignTable::create()->lazyLoading(true)
                ]),
            ]),
            Panel::create()->type("success")->header("Extra Columns")->sub([
                ExtraColumnsTable::create()->lazyLoading(true)
            ]),
            Panel::create()->type("danger")->header("Row Select Table")->sub([
                ViewSelectedRowButton::create()
                    ->cssClass("mb-2"),
                RowSelectTable::create(),
            ]),

            \demo\CodeDemo::create("
                Table is the most used visualization in a dashboard. Understanding the importance of it,
                our Table widget support various features such as: table style customization, auto fields generation,
                special columns types, paging, sorting, footer aggregation and more.
            ")->raw(true)
        ];
    }
}