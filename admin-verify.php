<?php
    require('action.php');
    mysqli_query($con,"update htrans_beli set hb_status = 1 where hb_id = '".$_POST['id']."'");
?>