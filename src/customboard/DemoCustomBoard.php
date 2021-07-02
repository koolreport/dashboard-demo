<?php

namespace demo\customboard;

use \koolreport\dashboard\CustomBoard;

use \demo\AutoMaker;

class DemoCustomBoard extends CustomBoard
{
    protected function onCreated()
    {
        //Location of folder which contains view file
        //You can point to any place that you want
        //This option is good for seperate view files from controller
        $this->viewFolder(__DIR__."/views");
    }

    protected function actionIndex($request, $response)
    {
        $topCustomers = AutoMaker::table("customers")
                        ->join('orders', 'customers.customerNumber', '=', 'orders.customerNumber')
                        ->groupBy("customers.customerNumber")
                        ->select("customers.customerNumber","customers.customerName")
                        ->count(1)->alias("numOrder")
                        ->orderBy("numOrder","desc")
                        ->take(10)
                        ->run();

        //Render the "views/index.view.php" file
        $this->renderView("index",[
            "topCustomers"=>$topCustomers
        ]); 
    }

    protected function actionList($request, $response)
    {
        $orders = AutoMaker::table("orders")
                    ->where("customerNumber",$request->params()["selectedCustomerNumber"])
                    ->select("orderNumber","orderDate","shippedDate","status")
                    ->run();
        $customerName = AutoMaker::table("customers")
                        ->select("customerName")
                        ->where("customerNumber",$request->params()["selectedCustomerNumber"])
                        ->run()
                        ->getScalar();


        //Render list view with $orders
        $this->renderView("list",[
            "customerName"=>$customerName,
            "orders"=>$orders,
        ]);
    }
}