<?php

namespace demo\cache;
use \demo\AutoMaker;

use \koolreport\dashboard\caching\FileCache;
/**
 * We extends AutoMakerWithCache from AutoMaker
 * and provide FileCache methods to this datasource.
 * Although the FileCache is provided, it will not
 * be activated. It wait for widget to do.
 */
class AutoMakerWithCache extends AutoMaker
{
    //Important that you provide cache object to datasource
    protected function cache()
    {
        return FileCache::create();
    }
}