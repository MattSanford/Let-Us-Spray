<?php

//Variables for connecting to your database.
  $hostname = "contactformbase.db.11152577.hostedresource.com";
  $username = "contactformbase";
  $dbname = "contactformbase";
  $password = "Usahockey4!!";
  $con = mysqli_connect($hostname, $username, $password, $dbname);
  $tbl_name = "client_base";

//Connecting to your database
  if ($con) {
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
    echo strlen($email);
  $email= mysqli_real_escape_string($con, $email);
//adding values into the database.
 $sql = "INSERT INTO $tbl_name (First Name, Last Name, Email, Address) VALUES ('$fname', '$lname', '$email', '$address')";
  $stmt = mysqli_prepare($con, $sql);
  if ($stmt->execute()){
    echo "27"; 
  }
  else {
    
  }


  //$result = mysqli_query($con, $sql); 
  //  if($result){
  //    echo "success";
  //    }
  //  else {
  //    echo mysqli_error($con);
  //    }




            //Fetching from your database table.
//            $query = "SELECT * FROM client_base";
//            $result = mysql_query($query);

//            if ($result) {
//                while($row = mysql_fetch_array($result)) {
//                    $name = $row["$yourfield"];
//                    echo "Name: $name<br>";
//                }
//            }
?>