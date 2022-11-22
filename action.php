<?php 
  session_start();

  $con = mysqli_connect("localhost", "root", "", "db_actionfigure");

  function alert($message){
    echo "<script>alert('$message')</script>";
  }  
?>