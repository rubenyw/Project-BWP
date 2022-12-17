<?php
	require("action.php");
    
    $id = $_REQUEST['update_id'];
    // Delete user dari DB
    $select_query = "SELECT af_status as 'Status' from actionfigure where af_id = '$id'";
    $hasil = mysqli_fetch_array(mysqli_query($con, $select_query), MYSQLI_ASSOC);
    $status = ($hasil['Status'] == 0? 1 : 0);
    
    $update_query = "UPDATE actionfigure SET af_status = $status where af_id = '$id'";
    $res = $con->query($update_query);
?>