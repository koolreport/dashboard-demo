<?php


$a=null;
echo isset($a)?"yes":"no";


?>

<?php
$dataStore = $this->dataStore("BPlt_BC")->filter("taxyear","=",$_SESSION['last_TY']);
?>
<h1>Business Components</h1>
<?php foreach($dataStore as $row): ?>
    <div style="margin-bottom:30px">
        <?php foreach($row as $key=>$value): ?>
            <div class="row">
                <div class="col-md-4">
                    <?php echo $key; ?>   
                </div>
                <div class="col-md-8">
                    <?php echo $value; ?>
                </div>
            </div>
        <?php endforeach ?>        
    </div>
<?php endforeach ?>

