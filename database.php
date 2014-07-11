
<?php

date_default_timezone_set('America/New_York');


  if (isset($_POST)) {
    //form checks
    $formOk = true;
    $errors = array();

    //submission data
    $ipAddress = $_SERVER['REMOTE_ADDR'];
    $date = date('M/d/Y');
    $time = date('g:i:s');

    //form Data
    $firstName = trim(stripslashes($_POST['firstName']));
    $lastName = trim(stripslashes($_POST['lastName']));
    $email = trim(stripslashes($_POST['email']));
    $botFilter = trim(stripslashes($_POST['email2']));
    $city = trim(stripslashes($_POST['city']));
    $zip = trim(stripslashes($_POST['zip_code']));
    $address = trim(stripslashes($_POST['address']));
    $job = trim(stripslashes($_POST['job']));
    $message = trim(stripslashes($_POST['message']));

      $headers = "From: <info@letusspraysoftwash.com>\r\n";
      $headers .= "MIME-Version: 1.0\r\n";
      $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
      "X-Mailer: PHP/" . phpversion();
      $emailBody = '
      <html>
        <body leftmargin="0" marginwidth="0" topmargin="0" marginheight="0" offset="0">

          <table width="100%" cellpadding="10" cellspacing="0">
            <tr valign="top" bgcolor="#00B0EA"  align="center">
              <td>
                <table width="500" cellpadding="0">
                  <tr align="center"> 
                    <td>
                    <img src="http://letusspraysoftwash.com/images/logos/web/sm-transparent.png">
                    </td>
                  </tr>
                </table>
              </td>
                  </tr>
                  <tr bgcolor="#fffff" height="25"></tr>
                    <table width="100%" cellpadding="10" cellspacing="15" bgcolor="#063A74">
                    <tr bgcolor="#ffffff" align="center">
                     <td>
                      <p>You have recieved a new message from your contact form!</p>
                      <p> <strong>Name:</strong> ' . $firstName .' '. $lastName .'</p>
                      <p><strong>Email Address: </strong>' . $email .  '</p>
                      <p><strong>Address: </strong>' . $address . '</p>
                      <p><strong>City: </strong>' . $city . '</p>
                      <p><strong>Zip: </strong>' . $zip . '</p>
                      <p><strong>Job: </strong>' . $job . '</p>
                      <p><strong>Message: </strong>' . $message . '</p>
                      <p>This message was sent from the IP Address: '. $ipAddress . ' on ' . $date .  ' at ' . $time . '</p>
              </td> 
            </tr>
          </table>  
          </table>
        </body>
      </html>';
    
    //form data validation
    if (empty($firstName) || empty($lastName)) {
      $formOk = false;
      $errors[] = "Please provide your first and last name.";
    } else {
        print_r(error_get_last());
      }

    if (empty($email)) {
      $formOk = false;
      $errors[] = "Please provide an email that we can respond to you at.";
      //validate email
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $formOk = false;
      $errors[] = "Please enter a valid email and make sure spelling is correct.";
    }
    if (empty($address)){
      $formOk = false;
      $errors[] = "Please provide the full address of the property in question.";
    } else {
        print_r(error_get_last());
      }
      if (empty($zip)) {
        $formOk = false;
      $errors[] = "Please provide the zip code of the property in question.";
      } else {
        print_r(error_get_last());
      }

      if (empty($city)) {
      $formOk = false;
      $errors[] = "Please provide the city of the property in question.";
      } else {
        print_r(error_get_last());
      }

    if (empty($message)) {
      $formOk = false;
      $errors[] = "Please tell us a litle bit about what is wrong.";
    } else {
        print_r(error_get_last());
      }
   

    if ($formOk && empty($botFilter)) {
      mail("webmaster@letusspraysoftwash.com", "mark@letusspraysoftwash.com" "New Contact Request!", $emailBody, $headers);

      } else {
        print_r(error_get_last());
      }

    $returnData = array(
      'posted_form_data' => array(
        'firstname' => $firstName,
        'lastname' => $lastName,
        'email' => $email,
        'address' => $address,
        'job' => $job,
        'message' => $message
        ), 
        'form_ok' => $formOk,
        'errors' => $errors 
      );

    if(empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) !== 'xmlhttprequest'){
     
    //set session variables
        session_start();
        $_SESSION['cf_returndata'] = $returndata;
         
        //redirect back to form
        header('location: ' . $_SERVER['HTTP_REFERER']);
  } else {
    die();
  }
}
?>
