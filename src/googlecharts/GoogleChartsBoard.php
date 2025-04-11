<?php

namespace demo\googlecharts;

use \koolreport\dashboard\Dashboard;

use \koolreport\dashboard\containers\Row;
use \koolreport\dashboard\containers\Panel;
use \koolreport\dashboard\widgets\Text;

class GoogleChartsBoard extends Dashboard
{
    protected function content()
    {
        return [
            Row::create([
                Panel::create()->header("<b>ColumnChart</b>")->width(1 / 2)->sub([
                    ColumnChartDemo::create()
                ]),
                Panel::create()->header("<b>LineChart</b>")->width(1 / 2)->sub([
                    LineChartDemo::create()
                ]),
            ]),
            Row::create([
                Panel::create()->header("<b>ComboChart</b>")->width(1 / 2)->sub([
                    ComboChartDemo::create()
                ]),
                Panel::create()->header("<b>BarChart</b>")->width(1 / 2)->sub([
                    BarChartDemo::create()
                ]),
            ]),
            Row::create([
                Panel::create()->header("<b>SteppedAreaChart</b>")->width(1 / 2)->sub([
                    SteppedAreaChartDemo::create()
                ]),
                Panel::create()->header("<b>AreaChart</b>")->width(1 / 2)->sub([
                    AreaChartDemo::create()
                ]),
            ]),
            Row::create([
                Panel::create()->header("<b>PieChart</b>")->width(1 / 2)->sub([
                    PieChartDemo::create()
                ]),
                Panel::create()->header("<b>DonutChart</b>")->width(1 / 2)->sub([
                    DonutChartDemo::create()
                ]),
            ]),
            Panel::create()->header("<b>Timeline</b>")->width(1 / 2)->sub([
                TimelineDemo::create()
            ]),
            Panel::create()->header("<b>BubbleChart</b>")->width(1 / 2)->sub([
                BubbleChartDemo::create()
            ]),
            Row::create([
                Panel::create()->header("<b>Histogram</b>")->width(1 / 2)->sub([
                    HistogramDemo::create()
                ]),
                Panel::create()->header("<b>TreeMap</b>")->width(1 / 2)->sub([
                    TreeMapDemo::create()
                ])
            ]),
            Panel::create()->header("<b>Candlestick</b>")->width(1 / 2)->sub([
                CandlestickDemo::create()
            ]),
            Panel::create()->header("<b>GaugeChart</b>")->width(1 / 2)->sub([
                GaugeChartDemo::create()
            ]),
            Row::create([
                Panel::create()->header("<b>GeoChart (AutoMaker's Sale Worldwide)</b>")->width(1 / 2)->sub([
                    GeoChartDemo::create()
                ]),
                Panel::create()->header("<b>Sankey</b>")->width(1 / 2)->sub([
                    SankeyDemo::create()
                ]),
            ]),

            \demo\CodeDemo::create("
                Google Charts is an amazing visualization library that is integrated with KoolReport in general
                and Dashboard specifically. Google Charts contains over 30 types of charts which are more than
                enough for us to present our data in an impressive way. In this example, we demonstrates 6 
                most used types of charts: ColumnChart, BarChart, PieChart, DonutChart, LineChart and special
                GeoChart map.
                <br/><br/>
                All charts are fully bound with data which acts as truly working example for you to get started.
            ")->raw(true)
        ];
    }
}
