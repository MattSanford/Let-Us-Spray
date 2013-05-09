<?php 
$fname = $_POST['fname'];
$lname = $_POST['lname'];
$name = $fname . " " . $lname;
$email = $_POST['email'];
$message = $_POST['message'];
$recipient = 'letusspray@verizon.net';
$subject = "Contact Form";
$formcontent = " From:  $name \n Message: $message";
$mailheader = "From:  $name \r\n";
mail($recipient, $subject, $formcontent, $mailheader) or die("Error!");
echo "Thank you!"
?>