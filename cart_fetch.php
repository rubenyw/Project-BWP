<?php
    require('action.php');
?>
<div class="w-50 me-5 border" >
<?php
    $query = "SELECT a.af_id as 'ID', a.af_name as 'Name', a.af_price as 'Harga', a.af_image_path as 'path', c.ca_qty as 'qty' from actionfigure a join cart c where c.ca_us_id = '".$_SESSION['userLogin']['id']."' and c.ca_status = 'Requested' and c.ca_af_id = a.af_id";
    $query = mysqli_query($con, $query);
    if(mysqli_num_rows($query) > 0){

    ?>
    <!-- Content -->
    <div class="table-responsive">
        <div class="container text-center">
            <?php
                $i = 0;
                while($row = mysqli_fetch_array($query, MYSQLI_ASSOC)){
                        
                    ?>
                    <div class="row row-cols-2 row-cols-lg-1 g-2 g-lg-3">
                        <div class="col align-item-center">
                            <form action="" method="post">
                                <div class="p-3 border bg-light rounded">
                                    <img src="<?=$row['path']?>" class="product-thumb" alt="">
                                    <p><?=$row['Name']?></p>
                                    <h5>Harga : Rp. <?=number_format($row['Harga'], 0, ',')?></h5>
                                    <input class="form-control w-25" type="number" name="qty" id="qty_<?= $i?>" step="1" min="1" value="<?=$row['qty']?>" onchange="update_item('<?=$row['ID']?>','<?=$i?>')">
                                    <h5>Subtotal : Rp. <?=number_format($row['Harga'] * $row['qty'], 0, ',')?></h5>
                                    <hr>
                                    <input type="hidden" name="id_figure" value="<?=$row['ID']?>">
                                    <button class="btn btn-danger btn-sm px-3 fw-bold" name="remove">
                                        <i class="bi bi-trash-fill me-2"></i>Remove
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                <?php
                    $i++;
                }
                    
                ?>
        </div>
    </div>

    <?php

    }else{

    ?>
    <div class="row align-items-center text-center" style="height: 200px;">
        <div class="col">
            <div class="h2">Belum ada Barang nih</div>
            <a class="text-danger" href="index.php">Belanja yuk</a>
        </div>
    </div>
    <?php

    }

    ?>
                            

</div>
<div class="w-25 border text-center justify-content-center py-4">
<?php   
    $id = $_SESSION['userLogin']['id'];
    $query = "SELECT (SUM(b.subtotal)) AS 'Total' FROM actionfigure a JOIN cart c ON c.ca_af_id = af_id JOIN (select a.af_price * c.ca_qty as 'subtotal' from cart c join actionfigure a on c.ca_af_id = a.af_id where c.ca_us_id = '$id') b JOIN users u ON u.us_id = c.ca_us_id and u.us_id = '".$_SESSION['userLogin']['id']."'";
    $query = $con -> query($query);
    $row = $query -> fetch_array(MYSQLI_ASSOC);
    if($row['Total'] != null){
        $price = $row['Total'];   
    ?>
    
    <!-- Content -->
    <form action="" method="post">
        <div class="h5 mb-3 text-start" style="">
            <h2>TOTAL :</h2>
        </div>
        <div class="h3 mb-3 text-start" style="color: gray;">Rp. <?=number_format($row['Total'], 0, ',')?></div><br><hr>
        <button class="btn btn-success w-100" name="checkout">CHECKOUT</button>
        </form>

    <?php

    }else{

    ?>

    <div class="h5 mb-3" style="color: gray;">TOTAL PRICE</div>
    <div class="h3 mb-3" style="color: red;">IDR 0</div>
    <button class="btn btn-secondary w-100 disable" disable>CHECKOUT</button>

    <?php

    }

    ?>
    
</div>