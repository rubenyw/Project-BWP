<?php
	require("action.php");

    $query = "SELECT * from users";
    $query = mysqli_query($con, $query);
    $counter = 1;
    while($row = mysqli_fetch_array($query, MYSQLI_ASSOC)){
        $status = ($row['us_status'] == 1? 'Aktif' : 'Non-aktif');
        $btn = ($row['us_status'] == 1? 'btn-outline-success' : 'btn-outline-danger'); 
?>
<tr>
    <td class='col-1'><?=$counter?></td>
    <td class='col-2'><?=$row['us_id']?></td>
    <td class='col-2'><?=$row['us_username']?></td>
    <td class='col-2'><?=$row['us_email']?></td>
    <td class='col-2'><?=$row['us_password']?></td>
    <td class='col-2'><?=($row['us_gender'] == 1? 'Laki-Laki' : 'Perempuan')?></td>
    <td class='col-1'>
        <input type='hidden' name='apply' value=''>
        <button onclick='update_user(this)' value='<?=$row['us_id']?>' class='btn <?=$btn?> btn-sm px-4'><?=$status?></button>
    </td>
</tr>
<?php
        $counter++;
    }
?>