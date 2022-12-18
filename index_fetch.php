<?php
    require('action.php');
    
    if(isset($_SESSION['filter'])){
        $series = $_SESSION['filter'];
        $select = "SELECT * from actionfigure where af_status = 1 and af_se_id like '%$series%'";
        unset($_SESSION['filter']);
    }else{
        $select = "SELECT * from actionfigure where af_status = 1";
    }

    $select = (mysqli_query($con, $select));

    if(mysqli_num_rows($select) > 0) {
    ?>
    <div class="row row-cols-2 row-cols-lg-4 g-2 g-lg-3">
    <?php
    while($row = mysqli_fetch_array($select, MYSQLI_ASSOC)){
    
        ?>
            <div class="col">
                <form action="">
                    <div class="p-3 border bg-light rounded">
                        <img src="assets/GambarFigure/<?=$row['af_id']?>.jpg" class="product-thumb" alt="">
                        <p><?=$row['af_name']?></p>
                        <button type="submit" name="item">Detail</button>
                    </div>
                </form>
            </div>                      
            
            <?php
        }
    ?>
    </div>
    <?php

    }else {
    
    ?>

    <div class="h1 text-danger">Maaf stok lagi Kosong</div>

    <?php
    }
    ?>