<?php
include "phpmailer/PHPMailerAutoload.php";

$gmailUsername = "kendrickjaviercosca@gmail.com";
$gmailPassword = "kencosca329";

// DON'T EDIT THID PART
$mail = new PHPMailer(); 
$mail->IsSMTP(); 
$mail->SMTPAuth = true; 
$mail->SMTPSecure = 'ssl'; // 
$mail->Host = "smtp.gmail.com";
$mail->Port = 465; // or 587
$mail->IsHTML(true);
$mail->Username = $gmailUsername;
$mail->Password = $gmailPassword;
//UP TO HERE

$mail->SetFrom($gmailUsername,"Account Verification");

$mail->Subject = "Email Verification";
    $mail->Body= "Hello, $fullname:<br>Thank you for registering to Library Management System. Please click the link below to continue.<br><a href='http://localhost/phplibcosca/verify.php?code=$verification_code'>Verify</a>";

$mail->AddAddress($email);

 if(!$mail->Send()) {
    echo "Mailer Error: " . $mail->ErrorInfo;
 } else {
    echo "Message has been sent";
 }

?>
