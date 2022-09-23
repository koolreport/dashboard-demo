<?php

namespace demo\d3;

use \koolreport\dashboard\Dashboard;

use \koolreport\dashboard\containers\Row;
use \koolreport\dashboard\containers\Panel;
use \koolreport\dashboard\widgets\Text;

class D3ChartsBoard extends Dashboard
{
    protected function content()
    {
        return [
            Row::create([
                Panel::create()->header("<b>ColumnChart</b>")->width(1/2)->sub([
                    ColumnChartDemo::create()
                ]),
                Panel::create()->header("<b>BarChart</b>")->width(1/2)->sub([
                    BarChartDemo::create()
                ]),
            ]),
            Row::create([
                Panel::create()->header("<b>PieChart</b>")->width(1/2)->sub([
                    PieChartDemo::create()
                ]),
                Panel::create()->header("<b>DonutChart</b>")->width(1/2)->sub([
                    DonutChartDemo::create()
                ]),
            ]),

            Panel::create()->header("<b>LineChart</b>")->sub([
                LineChartDemo::create()
            ]),
            Panel::create()->header("<b>Waterfall</b>")->sub([
                WaterfallDemo::create()
            ]),

            \demo\CodeDemo::create("
                Alternatively to Google Chart library, D3 library is your great option for data visualization.
                D3 contains all common used charts like BarChart, PieCharts etc. Beside we have added some
                special charts like above Waterfall chart and not-showing-here FunnelChart.
                <br/><br/>
                The great advantage of D3 over GoogleChart is that it does not requires library to load from internet.
                If you plan to build intranet dashboard for your company, propably D3 will be best option.
            ")->raw(true)
    ];
    }
}