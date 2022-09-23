<?php

namespace demo\admin\customer;

use demo\admin\order\Order;
use demo\AdminAutoMaker;
use koolreport\dashboard\admin\actions\DeleteAction;
use koolreport\dashboard\admin\actions\DetailAction;
use koolreport\dashboard\admin\actions\InlineEditAction;
use koolreport\dashboard\admin\actions\UpdateAction;
use koolreport\dashboard\admin\relations\HasMany;
use koolreport\dashboard\admin\Resource;
use koolreport\dashboard\fields\Currency;
use koolreport\dashboard\fields\ID;
use koolreport\dashboard\fields\Text;
use koolreport\dashboard\inputs\Select;
use koolreport\dashboard\validators\NumericValidator;
use koolreport\dashboard\validators\RequiredFieldValidator;

class Customer extends Resource
{
    protected function onCreated()
    {
        $this->manageTable("customers")->inSource(AdminAutoMaker::class);

        //Allow searchBox
        $this->listScreen()->searchBox()
        ->enabled(true)
        ->placeHolder("Search customers");

        $this->listScreen()->adminTable()
            ->tableStriped(true);
    }

    protected function relations()
    {
        return [
            HasMany::resource(Order::class)->link(["customerNumber"=>"customerNumber"])->title("Orders")
        ];
    }

    protected function filters()
    {
        return [
            CountryFilter::create()->title("Countries"),
            HighCreditFilter::create()->title("Credit Limit > $120k")
        ];
    }

    protected function glasses()
    {
        return [
            MostValuedCustomers::create()
        ];
    }

    protected function actions()
    {
        return [
            EmailAction::create()->showOnDetail(true),
            DetailAction::create(),
            UpdateAction::create()->showOnTable(false),
            InlineEditAction::create(),
            DeleteAction::create(),
        ];
    }

    protected function fields()
    {
        return [
            ID::create("customerNumber")
                ->searchable(true)
                ->sortable(true)
                ->validators([
                    RequiredFieldValidator::create(),
                    NumericValidator::create(),
                ]),

            Text::create("customerName")
                ->searchable(true)
                ->sortable(true),

            Text::create("country")
                ->searchable(true)
                ->sortable(true)
                ->inputWidget(
                    Select::create()
                    ->dataSource(function(){
                        return AdminAutoMaker::table("customers")->select("country")->distinct()->orderBy("country");
                    })
                    ->fields(function(){
                        return [
                            Text::create("country")
                        ];
                    })
                ),

            Text::create("city")
                ->showOnIndex(false),
            
            Text::create("addressLine1")->label("Address")
                ->showOnIndex(false),
            
            Text::create("phone")
                ->showOnIndex(false),

            Currency::create("creditLimit")
                ->USD()->symbol()
                ->sortable(true),
        ];
    }

    protected function highlights()
    {
        return [
            TotalCustomers::create()->width(1/3),
            TotalShippedOrders::create()->width(1/3),
            TotalPayments::create()->width(1/3),
        ];
    }

    /**
     * The bottom is where you can put extra widgets,
     * Here we just put the CodeDemo to show our demo code
     * which is not important in your real application.
     * @return array 
     */
    protected function bottom()
    {
        return [
            \demo\CodeDemo::create("
                Admin Panel is a new feature of Dashboard Framework which can help to contruct beautiful dashboard
                admin panel. Setting up different views of your data, applying data search & filter, adding custom
                actions on your data are all possible.
                <p>
                    This example demonstrates creating <code>Customer</code> resource to manage your customers table.
                </p>
            ")->raw(true)
        ];
    }
}