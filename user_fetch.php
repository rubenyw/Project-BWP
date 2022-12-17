<?php
	require("action.php");

    $query = "SELECT * from users";
    $query = mysqli_query($con, $query);
    $counter = 1;
    while($row = mysqli_fetch_array($query, MYSQLI_ASSOC)){
        $status = ($row['us_status'] == 1? 'Non-aktifkan' : 'Aktifkan');
        $btn = ($row['us_status'] == 1? 'btn-outline-danger' : 'btn-outline-success'); 
?>
    <tr class='my-5'>
        <td class='col-1'><?=$counter?></td>
        <td class='col-1'><?=$row['us_id']?></td>
        <td class='col-2'><?=$row['us_username']?></td>
        <td class='col-2'><?=$row['us_email']?></td>
        <td class='col-2'><?=$row['us_password']?></td>
        <td class='col-2'><?=($row['us_gender'] == 1? 'Laki-Laki' : 'Perempuan')?></td>
        <td class='col-2'>
            <input type='hidden' name='apply' value=''>
            <button onclick='update_user(this)' value='<?=$row['us_id']?>' class='btn <?=$btn?> btn-sm w-100'><?=$status?></button>
        </td>
    </tr>
<?php
        $counter++;
    }
?>