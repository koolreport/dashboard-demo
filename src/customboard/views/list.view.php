<?php
use \koolreport\widgets\koolphp\Table;
?>
<div class="card">
    <div class="card-header">
        <h5><?php echo $this->params()["customerName"]; ?></h5>
    </div>
    <div class="card-body">
        <div class="mb-3">
            <form method="ajax" action="index">
                <button class="btn btn-default">Back</button>
            </form>
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
            <form method="ajax" action="index">
                <button class="btn btn-default">Back</button>
            </form>        
        </div>

    </div>
</div>