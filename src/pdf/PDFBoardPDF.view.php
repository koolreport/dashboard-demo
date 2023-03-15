<?php
    $ProductTable = $dashboard->widget('ProductTable');
?>
<!DOCTYPE html>
<html>
    <head></head>
    <body>
    PDFBoardPDF view
    <?php echo $ProductTable->pageSize(50)->exportedView(); ?>
    </body>
</html>