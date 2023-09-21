<?php

namespace demo\apexcharts;

use \koolreport\dashboard\Dashboard;

use \koolreport\dashboard\containers\Html;
use \koolreport\dashboard\containers\Row;
use \koolreport\dashboard\containers\Panel;
use \koolreport\dashboard\widgets\Text;

class ApexChartsBoard extends Dashboard
{
    protected function content()
    {
        return [
            // Html::script()
            // ->attr('type', "text/javascript" )
            // ->attr('src', "https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.22.2/moment.min.js" )
            // ,

            Row::create([
                Panel::create()->header("<b>LineChart</b>")->width(1/2)->sub([
                    LineChartDemo::create()
                ]),
                Panel::create()->header("<b>AreaChart</b>")->width(1/2)->sub([
                    AreaChartDemo::create()
                ]),
            ]),

            Row::create([
                Panel::create()->header("<b>ColumnChart</b>")->width(1/2)->sub([
                    ColumnChartDemo::create()
                ]),
                Panel::create()->header("<b>BarChart</b>")->width(1/2)->sub([
                    BarChartDemo::create()
                ]),
            ]),

            Row::create([
                Panel::create()->header("<b>ComboChart</b>")->width(1/2)->sub([
                    ComboChartDemo::create()
                ]),
                Panel::create()->header("<b>RangeAreaChart</b>")->width(1/2)->sub([
                    RangeAreaChartDemo::create()
                ]),
            ]),
            
            Row::create([
                Panel::create()->header("<b>TimelineChart</b>")->width(1/2)->sub([
                    TimelineDemo::create()
                ]),
                Panel::create()->header("<b>FunnelChart</b>")->width(1/2)->sub([
                    FunnelChartDemo::create()
                ]),
            ]),

            Row::create([
                Panel::create()->header("<b>CandleStickChart</b>")->width(1/2)->sub([
                    CandleStickChartDemo::create()
                ]),
                Panel::create()->header("<b>BoxPlotChart</b>")->width(1/2)->sub([
                    BoxPlotChartDemo::create()
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

            Row::create([
                Panel::create()->header("<b>RadarChart</b>")->width(1/2)->sub([
                    RadarChartDemo::create()
                ]),
                Panel::create()->header("<b>PolarAreaChart</b>")->width(1/2)->sub([
                    PolarAreaChartDemo::create()
                ]),
            ]),

            Row::create([
                Panel::create()->header("<b>RadialBarChart</b>")->width(1/2)->sub([
                    RadialBarChartDemo::create()
                ]),
                Panel::create()->header("<b>RadialBarChart - Gauge form</b>")->width(1/2)->sub([
                    GaugeChartDemo::create()
                ]),
            ]),

            Row::create([
                Panel::create()->header("<b>BubbleChart</b>")->width(1/2)->sub([
                    BubbleChartDemo::create()
                ]),
                Panel::create()->header("<b>ScatterChart</b>")->width(1/2)->sub([
                    ScatterChartDemo::create()
                ]),
            ]),

            Row::create([
                Panel::create()->header("<b>HeatMapChart</b>")->width(1/2)->sub([
                    HeatMapChartDemo::create()
                ]),
                Panel::create()->header("<b>TreeMapChart</b>")->width(1/2)->sub([
                    TreeMapChartDemo::create()
                ]),
            ]),

            \demo\CodeDemo::create("
            Alternatively to Google Chart library, ApexCharts library is also your great choice for data visualization.
            ApexCharts contains all common used charts like BarChart, PieCharts etc. Furthermore, the library contains
            some special chart like PolarChart, RadarChart.
            <br/><br/>
            The great advantage of ApexCharts over GoogleChart is that it does not requires library to load from internet.
            If you plan to build intranet dashboard for your company, propably hartJs will be best option.
            ")->raw(true)
    ];
    }
}