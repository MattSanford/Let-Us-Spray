<?php
//Main focus is to submit a email to Mark every time somebody fills out the contact form.
//
//Problems that I see:
//1.lack of security (sql injections prone)
//2.no way to delete or filter duplicate entries to the database
//
//What I would like:
//On submission, email is sent to mark, values written to database, and a confirmation email is sent to user.
//

require_once('hv.php');
ob_start();
//Connecting to database
  if ($mysqli) {
    }
   else {
    die('Connect error (' . mysqli_connect_errno() . ')' . mysqli_connect_errno());
  }
print_r($_POST);
$_POST['firstName'];
$_POST['lastName'];
$_POST['email'];
$_POST['address'];
$_POST['job'];
$date = date('m/d/y'); 
$_POST['message']; 

  $fname = $_POST['firstName'];
  $lname = $_POST['lastName'];
  $email = $_POST['email'];
  $address = $_POST['address'];
  $job = $_POST['job'];
  $date = date('m/d/y'); 
  $message = $_POST['message']; 
  $fname= $mysqli->real_escape_string($fname);
  $lname= $mysqli->real_escape_string($lname);
  $email= $mysqli->real_escape_string($email);
  $address = $mysqli->real_escape_string($address);
  $message= $mysqli->real_escape_string($message);

  
// 1. check if all fields are filled, 
// 2. check if database for duplicate emails.

$result = $mysqli->query("SELECT * FROM client_base WHERE address = '$address'");
$num_rows = $result->num_rows;
$sql = "INSERT INTO client_base (firstName, lastName, address, email, job, day) VALUES('$fname', '$lname', '$address', '$email', '$job', '$date')";
if ($num_rows == 0) {

  $mysqli->query($sql);
}
else {
  echo "fail";
}
header ('Location: http://letusspray.dev');
$mysqli->close();
?>