<?php

//Variables for connecting to your database.
  $hostname = "contactformbase.db.11152577.hostedresource.com";
  $username = "contactformbase";
  $dbname = "contactformbase";
  $password = "Usahockey4!!";
  $mysqli = new mysqli($hostname, $username, $password, $dbname);
  $tbl_name = "client_base";

//Connecting to your database
  if ($mysqli) {
        echo 'success!...' . $con->host_info . "\n";
    }
   else {
    die('Connect error (' . mysqli_connect_errno() . ')' . mysqli_connect_errno());
  }
  print_r($_POST);
  $fname = $_POST['first_name'];
  $lname = $_POST['last_name'];
  $email = $_POST['email'];
  $address = $_POST['address'];
  $job = $_POST['job']; 
  $message = $_POST['message']; 
  $email= $mysqli->real_escape_string($email);
  $address = $mysqli->real_escape_string($address);
  
// 1. check if all fields are filled, 
// 2. check if database for duplicate emails.

  //adding values into the database.
  

    if (!$mysqli->set_charset("utf8")) {
        printf("Error loading character set utf8: %s\n", $mysqli->error);
    } 
    else {
      printf("Current character set: %s\n", $mysqli->character_set_name());
    

      if ($mysqli->query($sql)) {
          echo "success!";
        }

    else {
      echo $mysqli->error;
    }
}
$mysqli->close();
?>