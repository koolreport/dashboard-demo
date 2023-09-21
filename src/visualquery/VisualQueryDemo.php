<?php

namespace demo\visualquery;

use \koolreport\dashboard\widgets\VisualQuery;
use \koolreport\dashboard\fields\Text;
use \koolreport\dashboard\fields\Currency;
use \koolreport\dashboard\ColorList;

use  \demo\AutoMaker;

class VisualQueryDemo extends VisualQuery
{
    protected function defineSchemas()
    {
        return [
            "salesSchema" => array(
                "tables" => [
                    "customers"=>array(
                        "{meta}" => [
                            "alias" => "Table Customers",
                            "display" => "Table Customers",
                        ],
                        "customerNumber"=>array(
                            "alias"=>"Customer Number",
                            "display"=>"Customer Number",
                        ),
                        "customerName"=>array(
                            "alias"=>"Customer Name",
                        ),
                    ),
                    "orders"=>array(
                        "{meta}" => [
                            "alias" => "Table Orders",
                            "display" => "Table Orders"
                        ],
                        "orderNumber"=>array(
                            "alias"=>"Order Number",
                            "display"=>"Order Number"
                        ),
                        "orderDay" => array(
                            "alias" => "Order Day",
                            "expression" => "date(orders.orderDate)",
                            "type" => "date",
                        ),
                        "orderDate"=>array(
                            "alias"=>"Order Date",
                            "type" => "datetime"
                        ),
                        "orderMonth" => [
                            "expression" => "month(orderDate)",
                        ],
                        "customerNumber"=>array(
                           "alias"=>"Customer Number"
                        )
                    ),
                    "orderdetails"=>array(
                        "{meta}" => [
                            "alias" => "Order Details"
                        ],
                        "orderNumber"=>array(
                            "alias"=>"Order Number",
                            "type" => "number",
                        ),
                        "quantityOrdered"=>array(
                            "alias"=>"Quantity",
                            "type"=>"number",
                        ),
                        "priceEach"=>array(
                            "alias"=>"Price Each",
                            "type"=>"number",
                            "decimal"=>2,
                            "prefix"=>"$",
                        ),
                        "productCode"=>array(
                            "alias"=>"Product Code"
                        ),
                        "cost" => [
                            "expression" => "quantityOrdered * priceEach",
                            "expression" => "orderdetails.quantityOrdered * orderdetails.priceEach",
                            // "expression" => "orderdetails.orderNumber",
                            "alias"=>"Order Cost",
                            "type"=>"number",
                            "decimal"=>2,
                            "prefix"=>"$",
                        ]
                    ),
                    "products"=>array(
                        "{meta}" => [
                            "alias" => "Table Products"
                        ],
                        "productCode"=>array(
                            "alias"=>"Product Code"),
                        "productName"=>array(
                            "alias"=>"Product Name"),
                    )
                ],
                "relations" => [
                    ["customers.customerNumber", "leftjoin", "customers.customerNumber"],
                    ["orders.customerNumber", "leftjoin", "customers.customerNumber"],
                    ["orders.orderNumber", "join", "orderdetails.orderNumber"],
                    ["orderdetails.productCode", "leftjoin", "products.productCode"],
                ]
            ),
            "{meta}" => [
                "separator" => ".",
            ]
        ];
    }

    protected function display()
    {
        return [
            "schema" => "salesSchema",
            "defaultValue" => [
                "selectDistinct" => false,
                "selectTables" => [
                    "orders", // table alias =  "table_1", table name = "orders"
                    "orderdetails",
                    "products",
                    "customers", // table alias =  "table_4", table name = "customers"
                    "customers", // table alias =  "table_5", table name = "customers"
                ],
                "selectFields" => [
                    // "orders.orderDay",
                    "table_1.orderDay",
                    "table_2.cost",
                    "table_3.productName",
                    "customers.customerName",
                    "table_4.customerNumber",
                    "table_5.customerName",
                ],
                "filters" => [
                    "(",
                    [
                        "field" => "orders.orderDay",
                        "field" => "table_1.orderDay",
                        "operator" => ">", 
                        "value1" => "2001-01-01", 
                        "value2" => "", 
                        "logic" => "and",
                        "toggle" => true,
                    ],
                    [
                        "field" => "products.productCode", 
                        "field" => "table_3.productCode", 
                        "operator" => "nbtw", 
                        "value1" => "2", 
                        "value2" => "998", 
                        "logic" => "or",
                        "toggle" => true,
                    ],
                    ["products.productName", "<>", "a", "", "or", "toggle" => false],
                    ["products.productName", "nin", "a,b,c", "", "or"],
                    ["products.productName", "ctn", "a", "", "or"],
                    ")",
                ],
                "groups" => [
                    [
                        "field" => "orderdetails.cost", 
                        "field" => "table_2.cost", 
                        "aggregate" => "sum", 
                        "toggle" => true
                    ]
                ],
                "havings" => [
                    "(",
                    [
                        "field" => "sum(orderdetails.cost)",
                        "field" => "sum(table_2.cost)", 
                        "operator" => ">", 
                        "value1" => "10000", 
                        "value2" => "", 
                        "logic" => "and",
                        "toggle" => true,
                    ],
                    ["products.productName", "<>", "a", "", "or", "toggle" => false],
                    ")",
                ],
                "sorts" => [
                    [
                        "field" => "sum(orderdetails.cost)", 
                        "field" => "sum(table_2.cost)", 
                        "direction" => "desc", 
                        "toggle" => true
                    ],
                    ["products.productName", "desc", "toggle" => false]
                ],
                "limit" => [
                    "offset" => 0,
                    "limit" => 10,
                    "toggle" => true,
                ]
            ],
            // 'defaultValue' => null,
            "activeTab" => "filters",
            "activeTab" => "groups",
            // "activeTab" => "sorts",
            
            "onReady" => "function() {
                // console.log('visualquery ready');
                // document.querySelectorAll('krwidget[widget-name=\"visualquery1\"] .dropdown-toggle').forEach(function(btn) {
                //     btn.setAttribute('data-flip', false);
                // });
                // var addTableBtn = document.querySelector('#visualquery1-Tables button');
                // addTableBtn.addEventListener('click', function() {
                //     setTimeout(function() {
                //         document.querySelectorAll('krwidget[widget-name=\"visualquery1\"] .dropdown-toggle').forEach(function(btn) {
                //             btn.setAttribute('data-flip', false);
                //         });
                //     }, 500);
                // });
            }"
        ];
    }
}