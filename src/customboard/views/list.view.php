<?php
use \koolreport\widgets\koolphp\Table;
?>
<div class="card card-accent-success">
    <div class="card-header">
        <h5><?php echo $this->params()["customerName"]; ?></h5>
    </div>
    <div class="card-body">
        <div class="mb-3">
            <button onclick="backToIndex()" class="btn btn-default">Back</button>
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
            <button onclick="backToIndex()" class="btn btn-default">Back</button>
        </div>
    </div>
</div>
<script type="text/javascript">
function backToIndex() {
    showLoader();
    action("index");
}
</script>
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