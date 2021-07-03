<?php
use \koolreport\widgets\koolphp\Table;
?>
<div class="card card-accent-success">
    <div class="card-header">
        <h5><?php echo $this->params()["customerName"]; ?></h5>
    </div>
    <div class="card-body">
        <form method="ajax" action="index">
            <div class="mb-3">
                <button class="btn btn-default">Back</button>
            </div>
            <?php
                Table::create([
                    "dataSource"=>$this->params()["orders"],
                    "cssClass"=>array(
                        "table"=>"table table-striped table-bordered"
                    )
                ])
            ?>
            <div class="text-right">
                <button class="btn btn-default">Back</button>
            </div>
        </form>
    </div>
</div>