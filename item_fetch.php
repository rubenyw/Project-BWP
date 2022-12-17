<?php
    require('action.php');

    $query = "SELECT a.af_id as 'ID', a.af_name as 'Name', a.af_price as 'Price', a.af_stock as 'Stock', a.af_status as 'Status', s.se_name as 'Series' from actionfigure a join series s on s.se_id = a.af_se_id";
    $query = mysqli_query($con, $query);
    $counter = 1;
    while($row = mysqli_fetch_array($query, MYSQLI_ASSOC)){
?>
<tr>
    <td class='col-1'><?=$counter?></td>
    <td class='col-1'><?=$row['ID']?></td>
    <td class='col-3'><?=$row['Name']?></td>
    <td class='col-1'><?=$row['Price']?></td>
    <td class='col-1'><?=$row['Stock']?></td>
    <td class='col-2'><?=$row['Series']?></td>
    <td class='col'>
        <form action="" method='post'>
            <input type='hidden' name='id_item' value='<?=$row['ID']?>'>
            <button name='btn-update-item' class='btn btn-outline-success btn-sm px-4'>Update</button>
        </form>
    </td>
    <td class='col'>
        <input type='hidden' name='id_item' value='<?=$row['ID']?>'>
        <button name='btn-update-item' class='btn btn-outline-success btn-sm px-4'>Update</button>
    </td>
</tr>
<?php
        $counter++;
    }
?>