<?php

namespace demo\pivot;

use \koolreport\dashboard\widgets\pivot\PivotMatrix;
use \koolreport\dashboard\sources\CSV;
use \koolreport\processes\ColumnMeta;

class CustomersPivotMatrix extends PivotMatrix
{
    protected function dataSource()
    {
        return CSV::file("data/customer_product_dollarsales2.csv")
                ->fieldSeparator(";")
                ->select('customerName', 'productLine', 'productName','dollar_sales')
                ->where('customerName','<','Am')
                ->where('orderYear','>',2003)
                ->run() //After run(), we will get DataStore, we continue to process data with ColumnMeta 
                ->process(
                    ColumnMeta::process([
                        'dollar_sales'=>[
                            'type' => 'number',
                            'prefix' => '$',
                            'decimals'=>2,
                        ],
                    ])
                )
                ;
    }

    protected function process()
    {
        return [
            'dimensions'=>array(
                'column'=>'productLine',
                'row'=>'customerName, productName'
            ),
            'aggregates'=>array(
                'sum'=>'dollar_sales',
                'count'=>'dollar_sales'
            ),
        ];
    }

    protected function display()
    {
        return [
            // 'rowDimension'=>'row',
            // 'measures'=>array(
            //   'dollar_sales - sum', 
            // //   'dollar_sales - count',
            // ),
            'rowSort' => array(
              'dollar_sales - sum' => 'desc',
            ),
            'rowCollapseLevels' => array(0),
            // 'totalName' => 'All',
            // 'width' => '100%',
            'map' => array(
                'dataField' => [
                    'dollar_sales - sum' => 'Sales (in USD)',
                    'dollar_sales - count' => 'Number of Sales',
                ]
            )
        ];
    }

    protected function excelSetting()
    {
        return [
            // 'rowDimension'=>'row',
            // 'measures'=>array(
            //   'dollar_sales - sum', 
            // //   'dollar_sales - count',
            // ),
            'rowSort' => array(
              'dollar_sales - sum' => 'desc',
            ),
            'rowCollapseLevels' => array(0),
            // 'totalName' => 'All',
            // 'width' => '100%',
            'map' => array(
                'dataField' => [
                    'dollar_sales - sum' => 'Sales (in USD)',
                    'dollar_sales - count' => 'Number of Sales',
                ]
            )
        ];
    }    
    
}