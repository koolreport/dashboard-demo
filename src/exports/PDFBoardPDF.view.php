<?php
$ProductTable = $dashboard->widget('ProductTable');
?>
<!DOCTYPE html>
<html>

<head></head>

<body >
    PDFBoard PDF view
    <div class="">
        <div class="">
            <div class="" >
                <?php
                // echo $ProductTable->pageSize(50)->exportedView(); 
                // \koolreport\widgets\koolphp\Table::create([
                \koolreport\datagrid\DataTables::create([
                    'dataSource' => $ProductTable->pageSize(10)->exportedData(),
                    // "columns" => [
                    //     "productName", "buyPrice"
                    // ],
                    // 'width' => '100%',
                    // 'cssStyle' => [
                    //     'table' => 'width: 20cm !important'
                    // ],
                    // 'options' => [
                    //     'autoWidth' => true,
                    // ]
                ]);
                ?>
            </div>
            <!-- <div class="col-sm">
                One of three columns
            </div>
            <div class="col-sm">
                One of three columns
            </div> -->
        </div>
    </div>
</body>



</html>