<?php

namespace demo\kwidgets;

use \koolreport\dashboard\widgets\KWidget;
use \koolreport\dashboard\sources\CSV;
use \koolreport\processes\ColumnMeta;
use \koolreport\pivot\processes\Pivot;

class PivotDemo extends KWidget
{
    protected function dataSource()
    {
        return CSV::file("data/customer_product_dollarsales2.csv")
                ->fieldSeparator(";")
                ->select('customerName', 'productLine', 'productName','dollar_sales')
                ->where('customerName','<','Am')
                ->where('orderYear','>',2003)
                ->run()
                //After run(), we will get DataStore, we continu to process data with ColumnMeta and Pivot
                ->process(
                    ColumnMeta::process([
                        'dollar_sales'=>[
                            'type' => 'number',
                            'prefix' => '$',
                            'decimals'=>2,
                        ],
                    ])->pipe(
                        Pivot::process([
                            'dimensions'=>array(
                                'row'=>'customerName, productLine, productName'
                            ),
                            'aggregates'=>array(
                                'sum'=>'dollar_sales',
                                'count'=>'dollar_sales'
                            ),
                            // "partialProcessing" => true
                        ])
                    )
                );
    }

    protected function onCreated()
    {
        $this
        ->use(\koolreport\pivot\widgets\PivotMatrix::class)
        ->settings([
            'rowDimension'=>'row',
            'measures'=>array(
              'dollar_sales - sum', 
              'dollar_sales - count',
            ),
            'rowSort' => array(
              'dollar_sales - sum' => 'desc',
            ),
            'rowCollapseLevels' => array(1),
            'totalName' => 'All',
            'width' => '100%',
            'map' => array(
                'dataField' => [
                    'dollar_sales - sum' => 'Sales (in USD)',
                    'dollar_sales - count' => 'Number of Sales',
                ]
            )
        ]);
    }

}
