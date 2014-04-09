<?php 
$host = "contactformbase.db.11152577.hostedresource.com";
$user = "contactformbase";
$pass = "Usahockey4!!";
$table = "client_base";

// Create connection

$con = mysqli_connect($host, $user, $pass);
$mysqli = new mysqli($host, $user, $pass, $table);

// Check connection
if ($con)
  {
  echo "success"; } else { mysqli_connect_error();
  }

 ?>