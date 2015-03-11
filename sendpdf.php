<?php

// DISPLAY ERRORS
//ini_set('display_errors',1);
//ini_set('display_startup_errors',1);
//error_reporting(-1);

// GRAB ALL VARIABLES
$firstName = $_POST['firstName'];
$lastName = $_POST['lastName'];
$email = $_POST['email'];
$phoneNumber = $_POST['phoneNumber'];
$degree = $_POST['degree'];
$dreamJob = $_POST['dreamJob'];

if ($dreamJob == "BPO"){
	$address = 'sophia.haines@talkpush.com';
}

if ($dreamJob == "HRM"){
	$address = 'sophia.haines@talkpush.com';
}

if ($dreamJob == "Other"){
	$address = 'sophia.haines@talkpush.com';
}

// DEFINE THE HTML THAT WILL BE CONVERTED INTO THE PDF
$content = 	"The first name is $firstName<BR>".
			"The last name is $lastName <BR>".
			"The email is $email <BR>".
			"The phone number is $phoneNumber <BR>".
			"The degree name is $degree <BR>".
			"The dream job is $dreamJob <BR>";


// CONVERT THE ABOVE HTML INTO A PDF
require_once("dompdf/dompdf_config.inc.php");
$html =
    '<html><body>'.
    '<p>'.$content.'</p>'.
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
$mail = new PHPMailer(); // defaults to using php "mail()"
$body = ''; // Here is the body content

$mail->AddReplyTo("hello@talkpush.com","Talkpush System");
$mail->SetFrom('hello@talkpush.com', 'Talkpush System');

$mail->AddAddress($address, "");
$mail->Subject    = "LPU candidate";
$mail->MsgHTML($body);
$mail->AddAttachment($pdfname);      // attachment
if(!$mail->Send()) {
  echo "Mailer Error: " . $mail->ErrorInfo;
} else {
//  echo "Message sent!";
}

// Redirect to next page
header('Location: thanks.html');


?>

