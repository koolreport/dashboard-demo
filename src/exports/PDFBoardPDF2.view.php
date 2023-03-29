<?php 
    use \koolreport\widgets\koolphp\Table;
    use \koolreport\widgets\google\ColumnChart;
?>

<html>
    <body style="margin:0.5in 1in 0.5in 1in">
        <!-- <link rel="stylesheet" href="../../../assets/bs3/bootstrap.min.css" />
        <link rel="stylesheet" href="../../../assets/bs3/bootstrap-theme.min.css" />    -->
        <div><i>Sakila Rental Report 2</i></div>

        <?php
        $ProductTable = $dashboard->widget('ProductTable');
        Table::create(array(
            "dataStore"=>$ProductTable->pageSize(10)->exportedData(),
            "columns"=>array(
                "productName"=>array(
                    // "label"=>"Month",
                    // "type"=>"datetime",
                    // "format"=>"Y-n",
                    // "displayFormat"=>"F, Y",
                ),
                "buyPrice"=>array(
                    // "label"=>"Amount",
                    // "type"=>"number",
                    // "prefix"=>"$",
                )
            ),
            "cssClass"=>array(
                "table"=>"table-hover table-bordered"
            )
        ));
        ?>
    </body>
    <!-- <style>
        @media print {
            body {
                min-width: 0 !important;
            }
            .container {
                min-width: 0 !important;
            }
        }
    </style> -->
</html>