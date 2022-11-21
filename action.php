<?php 
  session_start();

  $con = mysqli_connect("localhost", "root", "", "db_toko_alat_musik");

  function alert($message){
    echo "<script>alert('$message')</script>";
  }  
?>