<?php

// DISPLAY ERRORS
ini_set('display_errors',1);
ini_set('display_startup_errors',1);
error_reporting(-1);

// GRAB ALL VARIABLES
if (isset($_POST['firstName'])) {$firstName = $_POST['firstName'];}
if (isset($_POST['lastName'])) {$lastName = $_POST['lastName'];}
if (isset($_POST['email'])) {$email = $_POST['email'];}
if (isset($_POST['phoneNumber'])) {$phoneNumber = $_POST['phoneNumber'];}
if (isset($_POST['degree'])) {$degree = $_POST['degree'];}
if (isset($_POST['bpoJob'])) {$bpoJob = $_POST['bpoJob'];}
if (isset($_POST['hrmJob'])) {$hrmJob = $_POST['hrmJob'];}
if (isset($_POST['otherJob'])) {$otherJob = $_POST['otherJob'];}
if (isset($_POST['otherDreamJob'])) {$otherDreamJob = $_POST['otherDreamJob'];}

// DEFINE THE HTML THAT WILL BE CONVERTED INTO THE PDF
$content = 	"The first name is $firstName<BR>".
			"The last name is $lastName <BR>".
			"The email is $email <BR>".
			"The phone number is $phoneNumber <BR>".
			"The degree name is $degree <BR><BR>";
$maxContent = $content."Their other dream job would be: ".$otherDreamJob;


// CONVERT THE ABOVE HTML INTO A PDF
require_once("dompdf/dompdf_config.inc.php");
$html =
    '<html><body>'.
    '<p>'.$content.'</p>'.
    '</body></html>';

$maxhtml =
    '<html><body>'.
    '<p>'.$maxContent.'</p>'.
    '</body></html>';

$dompdf = new DOMPDF();
$dompdf->load_html($html);
$dompdf->render();

// SAVE THE PDF TO THE HARD DISK
$pdfname = "LPU-TALK.pdf";
$pdf = $dompdf->output();
file_put_contents($pdfname, $pdf);

// SEND OUT THE E-MAIL WITH THAT PDF
require_once('PHPMailer/class.phpmailer.php');

if (isset($_POST['bpoJob'])){
  $BPOJobMail = new PHPMailer(); // defaults to using php "mail()"
  $BPOJobMail->AddReplyTo("hello@talkpush.com","Talkpush System");
  $BPOJobMail->SetFrom('hello@talkpush.com', 'Talkpush System');
  $BPOJobMail->Subject = "LPU candidate";
  $BPOJobMail->AddAttachment($pdfname);      // attachment
  $BPOJobMail->AddAddress("sophia.haines@talkpush.com", "");
  $BPOJobMail->MsgHTML('.');

  if(!$BPOJobMail->Send()) {
    echo "Mailer Error: " . $BPOJobMail->ErrorInfo;
  } else {
    //  echo "Message sent!";
  }
}

if (isset($_POST['hrmJob'])){
  $HRMJobMail = new PHPMailer(); // defaults to using php "mail()"
  $HRMJobMail->AddReplyTo("hello@talkpush.com","Talkpush System");
  $HRMJobMail->SetFrom('hello@talkpush.com', 'Talkpush System');
  $HRMJobMail->Subject = "LPU candidate";
  $HRMJobMail->AddAttachment($pdfname);      // attachment
  $HRMJobMail->AddAddress("sophia.haines@talkpush.com", "");
  $HRMJobMail->MsgHTML('.');

  if(!$HRMJobMail->Send()) {
    echo "Mailer Error: " . $HRMJobMail->ErrorInfo;
  } else {
    //  echo "Message sent!";
  }
}

if (isset($_POST['otherJob'])){
  $otherJobMail = new PHPMailer(); // defaults to using php "mail()"
  $otherJobMail->AddReplyTo("hello@talkpush.com","Talkpush System");
  $otherJobMail->SetFrom('hello@talkpush.com', 'Talkpush System');
  $otherJobMail->Subject = "LPU candidate";
  $otherJobMail->AddAddress("sophia.haines@talkpush.com", "");
  $otherJobMail->MsgHTML($maxhtml);

  if(!$otherJobMail->Send()) {
    echo "Mailer Error: " . $otherJobMail->ErrorInfo;
  } else {
    //  echo "Message sent!";
  }
}

// Redirect to next page
header('Location: http://www.lputalk.com/');
?>

