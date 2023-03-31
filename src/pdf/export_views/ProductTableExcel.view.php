<div>
    <div>Chart Data Excel Export</div>
    <div>
        <?php
        $styleArray = [
            'font' => [
                'name' => 'Calibri', //'Verdana', 'Arial'
                'size' => 30,
                'bold' => true,
                'italic' => true,
                'underline' => 'none', //'double', 'doubleAccounting', 'single', 'singleAccounting'
                'strikethrough' => FALSE,
                'superscript' => false,
                'subscript' => false,
                'color' => [
                    'rgb' => '808080',
                    'argb' => 'FF000000',
                ]
            ],
        ];
        // echo get_class($report);
        // echo get_class($widget);
        // $widget->renderXLSXWidget();
        // \koolreport\excel\LineChart::create([
        \koolreport\excel\Table::create([
            "dataSource" => $widget->exportedData(),
            "excelStyle" => [
                "header" => function ($colName) use ($styleArray) {
                    return $styleArray;
                },
                "cell" => function ($colName, $value, $row) use ($styleArray) {
                    return $styleArray;
                },
            ],
            'layout' => null, // false
        ]);
        ?>
    </div>
    <div>
        <?php
        // echo get_class($widget);
        ?>
    </div>
</div>