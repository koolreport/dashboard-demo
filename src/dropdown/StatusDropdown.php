<?php

namespace demo\dropdown;

use \koolreport\dashboard\inputs\Dropdown;
use \demo\AutoMaker;
use \koolreport\dashboard\menu\MenuItem;

class StatusDropdown extends Dropdown
{
    use \koolreport\dashboard\TWidgetState;
    protected function onCreated()
    {
        $this->type("default");
    }

    protected function actionSubmit($request, $response)
    {
        $selectedText = $request->params()["selectedText"];
        $this->state("selectedText",$selectedText);
        $this->update();
        $this->sibling("OrderTable")->pageIndex(0)->update();
    }

    public function getSelectedText()
    {
        return $this->state("selectedText")?$this->state("selectedText"):"None";
    }

    protected function onRendering()
    {
        $this->type(function(){
            switch($this->getSelectedText()){
                case "Shipped":
                case "Resolved":
                    return "success";
                case "Cancelled":
                case "Disputed":    
                    return "danger";
                case "On Hold":
                    return "warning";
                case "In Process":
                    return "info";
                default:
                    return "default";
            }
        })
        ->title($this->getSelectedText());
        return true;
    }

    protected function items()
    {
        $data = AutoMaker::table("orders")
                ->groupBy("status")
                ->select("status")
                ->run();
        $items = [
            "None"=>MenuItem::create()
        ];
        foreach($data as $row) {
            $items[$row["status"]] = MenuItem::create()->cssClass(function(){
                    switch($this->text()){
                        case "Shipped":
                        case "Resolved":
                            return "text-success";
                        case "Cancelled":
                        case "Disputed":    
                            return "text-danger";
                        case "On Hold":
                            return "text-warning";
                        case "In Process":
                            return "text-info";
                        default:
                            return "text-default";
                }
            });
        }
        return $items;
    }
}