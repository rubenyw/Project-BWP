<?php
    require('action.php');
    $data = json_decode($_POST["params"],true);
    
    $user = $_SESSION['userLogin']['id'];
    $qty = $data['qty'];
    $figure = $data['id_figure'];
    $update = "UPDATE cart set ca_qty = $qty where ca_us_id = '$user' and ca_af_id = '$figure'";
    print_r($update);
    mysqli_query($con, $update);

?>