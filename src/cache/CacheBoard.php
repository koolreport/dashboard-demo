<?php 

namespace demo\cache;

use \koolreport\dashboard\Dashboard;

use \koolreport\dashboard\containers\Panel;
use \koolreport\dashboard\containers\Row;

use \koolreport\dashboard\inputs\Button;
use \koolreport\dashboard\Client;

class CacheBoard extends Dashboard
{
    protected function content()
    {
        return [
            Panel::create()->header("<b>Control Panel</b>")->sub([
                Button::create()->text("Refresh Dashboard")
                    ->onClick(function(){
                        return Client::dashboard("CacheBoard")->load();
                    })
            ]),
            Row::create([
                Panel::create()->header("<b>Without Cache</b>")->type("warning")->sub([
                    SampleWidget::create("withoutCache")
                        ->lazyLoading(true)
                ]),
                Panel::create()->header("<b>With Cache</b>")->type("success")->sub([
                    SampleWidget::create("withCache")
                        ->lazyLoading(true)
                        ->cache("10min") //Cache 10 min
                ]),    
            ]),
            \demo\CodeDemo::create("
                Caching can make your dashboard load faster. When activated, result returned to a widget will be stored
                for later accessing. The next data query will be omitted and previous data query result will be used
                if the widget is loaded again within a predefined period of time. 
            ")->raw(true)
        ];
    }
}