<?php 

namespace demo\cache;

use \koolreport\dashboard\Dashboard;

use \koolreport\dashboard\containers\Panel;
use \koolreport\dashboard\containers\Row;

use \koolreport\dashboard\inputs\Button;
use \koolreport\dashboard\Client;

class CacheBoard extends Dashboard
{
    protected function widgets()
    {
        return [
            Panel::create()->header("Control Panel")->sub([
                Button::create()->text("Refresh Dashboard")
                    ->onClick(function(){
                        return Client::dashboard("CacheBoard")->load(["abc"=>"haha"]);
                    })
            ]),
            Row::create([
                Panel::create()->header("Without Cache")->sub([
                    SampleWidget::create("withoutCache")
                        ->lazyLoading(true)
                ]),
                Panel::create()->header("With Cache")->sub([
                    SampleWidget::create("withCache")
                        ->lazyLoading(true)
                        ->cache(5*60) //Cache 5 min
                ]),    
            ]),
        ];
    }
}