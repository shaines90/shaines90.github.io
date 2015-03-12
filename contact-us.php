<?php

// DISPLAY ERRORS
//ini_set('display_errors',1);
//ini_set('display_startup_errors',1);
//error_reporting(-1);

// GRAB ALL VARIABLES
$fullName = $_POST['fullName'];
$contactEmail = $_POST['contactEmail'];
$content = $_POST['content'];

// SEND OUT THE E-MAIL WITH THAT PDF
require_once('PHPMailer/class.phpmailer.php');
$mail = new PHPMailer(); // defaults to using php "mail()"
$body =
      "Name: $fullName<BR><BR>".
      "Email: $contactEmail <BR><BR>".
      "Message: $content <BR>"; // Here is the body content

$mail->AddReplyTo("hello@talkpush.com","Talkpush System");
$mail->SetFrom('hello@talkpush.com', 'Talkpush System');

$mail->AddAddress("sophia.haines@talkpush.com","LPUtalk");
$mail->Subject    = "LPU Contact";
$mail->MsgHTML($body);
if(!$mail->Send()) {
  echo "Mailer Error: " . $mail->ErrorInfo;
} else {
//  echo "Message sent!";
}

// Redirect to next page
header('Location: index.html');
?>

