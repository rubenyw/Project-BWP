<?php
	require("action.php");
    
    $id = $_REQUEST['update_id'];
    // Delete user dari DB
    $select_query = "SELECT us_status as 'Status' from users where us_id = '$id'";
    $hasil = mysqli_fetch_array(mysqli_query($con, $select_query), MYSQLI_ASSOC);
    $status = ($hasil['Status'] == 0? 1 : 0);
    
    $update_query = "UPDATE users SET us_status = $status where us_id = '$id'";
    $res = $con->query($update_query);
?>