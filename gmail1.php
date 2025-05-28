<?php
$name = $_POST['userName'];
$from = $_POST['userEmail'];
$phone = $_POST['userPhone'];
$comments = $_POST['userMsg'];

/**
 * This example shows settings to use when sending via Google's Gmail servers.
 */

//SMTP needs accurate times, and the PHP time zone MUST be set
//This should be done in your php.ini, but this is how to do it if you don't have access to that
date_default_timezone_set('Etc/UTC');

require 'class/PHPMailerAutoload.php';

//Create a new PHPMailer instance
$mail = new PHPMailer;

//Tell PHPMailer to use SMTP
$mail->isSMTP();

//Enable SMTP debugging
// 0 = off (for production use)
// 1 = client messages
// 2 = client and server messages
$mail->SMTPDebug = 0;

//Ask for HTML-friendly debug output
$mail->Debugoutput = 'html';

//Set the hostname of the mail server
$mail->Host = 'mail.my-proprima.com';

//Set the SMTP port number - 587 for authenticated TLS, a.k.a. RFC4409 SMTP submission
$mail->Port = 587;

//Set the encryption system to use - ssl (deprecated) or tls
$mail->SMTPSecure = 'tls';

//Whether to use SMTP authentication
$mail->SMTPAuth = true;

//Username to use for SMTP authentication - use full email address for gmail
$mail->Username = "contact@my-proprima.com";      //Need to change

//Password to use for SMTP authentication
$mail->Password = "Tirumala55#";                   //Need to change

//Set who the message is to be sent from
$mail->setFrom($from, $name);    //Need to change

//Set an alternative reply-to address
//$mail->addReplyTo('replyto@example.com', 'First Last');   //If Required

//Set who the message is to be sent to
$mail->addAddress('proprima@gmail.com', 'Pro Prima');  //Need to change

//Set the subject line
$mail->Subject = 'Pro Prima Enterprise : Enquiry by: '.$name;         //Need to change

//Read an HTML message body from an external file, convert referenced images to embedded,
//convert HTML into a basic plain-text alternative body
//$mail->msgHTML(file_get_contents('contents.html'), dirname(__FILE__));    //If Required

$msg = "Name : ".$name."<br/>Email : ".$from."<br/>Contact No : ".$phone."<br/>Comments . : ".$comments;
$mail->msgHTML($msg);          //Need to change

//Replace the plain text body with one created manually
//$mail->AltBody = 'This is a plain-text message body';     //If Requireds

//Attach an image file
//$mail->addAttachment('images/phpmailer_mini.png');        //If Required

//send the message, check for errors
if (!$mail->send()) {
    //echo "Mailer Error: " . $mail->ErrorInfo;
    echo "<script>if(confirm('Request failed.')){history.go(-1);}else{history.go(-1);}</script>";
} else {
    echo "<script>if(confirm('Request sent successfully.')){window.location='index.html';}else{window.location='index.html';}</script>";
    //echo "<script>alert('Request sent successful.')</script>";
    //echo "Message sent!";
}
