<?php

namespace demo\admin\employee;

use demo\AdminAutoMaker;
use koolreport\dashboard\admin\relations\HasMany;
use koolreport\dashboard\admin\Resource;
use koolreport\dashboard\fields\ID;
use koolreport\dashboard\fields\RelationLink;
use koolreport\dashboard\fields\Text;
use koolreport\dashboard\fields\Link;

class Employee extends Resource
{
    protected function onCreated()
    {
        $this->manageTable("employees")->inSource(AdminAutoMaker::class);
    }

    // protected function relations()
    // {
    //     return [
    //         HasMany::resource(Employee::class)
    //             ->link(["reportTo"=>"employeeNumber"])
    //             ->title("Subs"),
    //     ];
    // }

    protected function query($query)
    {
        return $query->leftJoin("employees as et","et.employeeNumber","=","employees.reportsTo")
            ->select("et.firstName")->alias("reportsToFirstName")
            ->select("employees.reportsTo","employees.employeeNumber","employees.firstName","employees.lastName","employees.email");
    }

    protected function fields()
    {
        return [
            ID::create("employeeNumber"),
            Text::create("firstName"),
            Text::create("lastName"),
            Link::create("email")
            ->formatUsing(function($value,$row){
                return $row["firstName"];
            }),
            RelationLink::create("reportsTo")
            ->formatUsing(function($value,$row){
                return $row["reportsToFirstName"];
            })
            ->linkTo(Employee::class)
        ];
    }
}