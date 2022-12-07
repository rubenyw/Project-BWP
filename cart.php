<?php
    require('action.php');
    $id = $_SESSION['userLogin']['id'];
    $query = "SELECT * from cart where ca_us_id = '$id'";
    $query = mysqli_query($con, $query);
    if(mysqli_num_rows($query) > 0){
        while($row = mysqli_fetch_array($query, MYSQLI_ASSOC)){
?>
    <!-- BUAT LIHAT CART -->
    <h1><?=$row['ca_af_id']?></h1>
<?php
        }
    }
?>