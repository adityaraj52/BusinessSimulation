<?php

require_once('/Applications/AMPPS/www/BusinessSimulation/resources/phpmail/phpmailer/PHPMailerAutoload.php');

$mail = new PHPMailer;

//Enable SMTP debugging.
$mail->SMTPDebug = 3;
//Set PHPMailer to use SMTP.
$mail->isSMTP();
//Set SMTP host name
$mail->Host = "mail.tu-clausthal.de";
//Set this to true if SMTP host requires authentication to send email
$mail->SMTPAuth = true;
//Provide username and password
$mail->Username = "araj14";
$mail->Password = "Rokyier9";
//If SMTP requires TLS encryption then set it
$mail->SMTPSecure = "tls";
//Set TCP port to connect to
$mail->Port = 993;

$mail->From = "name@gmail.com";
$mail->FromName = "Full Name";

$mail->addAddress("adityaraj5252@gmail.com", "Aditya Raj");

$mail->isHTML(true);

$mail->Subject = "Subject Text";
$mail->Body = "<i>Mail body in HTML</i>";
$mail->AltBody = "This is the plain text version of the email content";

if(!$mail->send())
{
    echo "Mailer Error: " . $mail->ErrorInfo;
}
else
{
    echo "Message has been sent successfully";
}