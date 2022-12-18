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