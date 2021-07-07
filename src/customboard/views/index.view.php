<?php
use \koolreport\inputs\Select;
?>
<div class="card card-accent-primary">
    <div class="card-header">
        <h5>Select customer to view their orders</h5>
    </div>
    <div class="card-body">
        <form method="ajax" action="list">
            <div class="row">
                <div class="col-md-4">
                    <?php
                        Select::create([
                            "name"=>"selectedCustomerNumber",
                            "dataSource"=>$this->params()["topCustomers"],
                            "dataBind"=>[
                                "text"=>"customerName",
                                "value"=>"customerNumber",
                            ],
                            "attributes"=>array(
                                "class"=>"form-control",
                            )
                        ])
                    ?>            
                </div>
                <div class="col-md-1">
                    <button class="btn btn-primary">View Orders</button>
                </div>
            </div>
        </form>
    </div>
</div>
<?php 
    echo \demo\CodeDemo::create("
        This example demonstrates how to make dynamic dashboard with CustomBoard.
        When user selects a customer and hit [View Orders], the selected customer number
        will be transmitted to actionList, here data will be queried and the list.view.php
        will be rendered to client.
    ")
    ->dashboard($this->board())
    ->app($this->board()->app())
    ->view();
?>