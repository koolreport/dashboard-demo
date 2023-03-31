<div>
    <div>Dashboard excel export</div>
    <div>
        <?php
        // $dashboard = $this->params['target'];
        $BarChartDemo = $dashboard->widget("BarChartDemo");
        // $LineChartDemo->renderXLSXWidget();
        // echo get_class($LineChartDemo);
        \koolreport\excel\BarChart::create([
            "dataSource" => $BarChartDemo->exportedData(),
            'layout' => null, // false
        ]);
        ?>
    </div>
    <div range="A25:H40">
        <?php
        // $dashboard = $this->params['target'];
        $LineChartDemo = $dashboard->widget("LineChartDemo");
        // echo get_class($LineChartDemo);
        \koolreport\excel\LineChart::create([
            "dataSource" => $LineChartDemo->exportedData(),
            'layout' => null, // false
        ]);
        ?>
    </div>
</div>