<?php

namespace demo\admin\employee;

use demo\AdminAutoMaker;
use koolreport\dashboard\admin\relations\HasMany;
use koolreport\dashboard\admin\Resource;
use koolreport\dashboard\fields\ID;
use koolreport\dashboard\fields\RelationLink;
use koolreport\dashboard\fields\Text;

class Employee extends Resource
{
    protected function onCreated()
    {
        $this->manageTable("employees")->inSource(AdminAutoMaker::class);
    }

    protected function relations()
    {
        return [
            HasMany::resource(Employee::class)
            ->link(["employeeNumber"=>"reportsTo"])
        ];
    }

    protected function query($query)
    {
        // return AdminAutoMaker::table([
        //     "employees",
        //     "e2"=>"employees",
        // ])
        // ->whereColumn([
        //     ["employees.reportsTo","=","e2.employeeNumber"]
        // ])
        // ->select("e2.firstName")->alias("reportsToFirstName")
        // ->select("employees.reportsTo","employees.employeeNumber","employees.firstName","employees.lastName","employees.email");
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
            Text::create("email"),
            RelationLink::create("reportsTo")
            ->formatUsing(function($value,$row){
                return $row["reportsToFirstName"];
            })
            ->linkTo(Employee::class)
        ];
    }
}