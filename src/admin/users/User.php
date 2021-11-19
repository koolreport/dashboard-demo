<?php

namespace demo\admin\users;

use demo\AdminAutoMaker;
use koolreport\dashboard\admin\Resource;
use koolreport\dashboard\fields\ID;
use koolreport\dashboard\fields\Text;

class User extends Resource
{
    protected function onCreated()
    {
        $this->manageTable("users")->inSource(AdminAutoMaker::class);
    }

    protected function fields()
    {
        return [
            ID::create("id"),
            Text::create("username"),
            Text::create("displayname"),    
        ];
    }
}