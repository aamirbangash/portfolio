<?php
if(isset($_POST['submit']) && $_POST['website'] == '' && $_POST['message'] != '') {

$to = "aamir@alibangash.com";

// data the visitor provided
$fname_field = filter_var($_POST['name'], FILTER_SANITIZE_STRING);
$email_field = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);
$phone_field = filter_var($_POST['phone'], FILTER_VALIDATE_EMAIL);
$need_field = filter_var($_POST['need'], FILTER_SANITIZE_STRING);
$message_field = filter_var($_POST['message'], FILTER_SANITIZE_STRING);

//constructing the message
$body = "
The submitted form data is given below\n\n
Full Name: $fname_field $lname_field\n
E-Mail: $email_field\n
Phone: $phone_field\n
Requirements: $need_field\n
Message:\n\n $message_field";
	
if( $_POST['email'] && !preg_match( "/[\r\n]/", $_POST['email']) ) {
	  $headers = "From: $_POST[email]";
	} else {
	  $headers = "From: $youremail";
	}
	
	
mail($to, 'Hello Aamir!', $body, $headers );

// redirect to confirmation
header('Location: thanks');

} else {

echo "Failure";

}
?> 