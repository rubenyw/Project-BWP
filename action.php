<?php 
  session_start();

  $con = mysqli_connect("localhost", "root", "", "bioskop_xx2");

  function alert($message){
    echo "<script>alert('$message')</script>";
  }  
?>