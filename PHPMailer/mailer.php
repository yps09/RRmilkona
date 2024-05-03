<?php

// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'src/Exception.php';
require 'src/PHPMailer.php';
require 'src/SMTP.php';
$mail = new PHPMailer;                              // Passing `true` enables exceptions


    //Server settings
	$mail->isSMTP();                                      // Set mailer to use SMTP
	$mail->Host = 'webmail.rrmilkona.com';  // Specify main and backup SMTP servers
    $mail->SMTPAuth = true;                               // Enable SMTP authentication
    $mail->Username = 'info@rrmilkona.com';                 // SMTP username
    $mail->Password = 'Milkona@123';                           // SMTP password
    $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` 'tls' also accepted
	
	//$mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
	$mail->SMTPOptions = [
    'ssl' => [
        'verify_peer' => false,
        'verify_peer_name' => false,
        'allow_self_signed' => true,
    ]
];	
    $mail->Port = 25;                                    // TCP port to connect to
	$mail->EnableSsl = false;
    //Recipients
    $mail->setFrom('info@rrmilkona.com', 'info@rrmilkona.com');
    $mail->addAddress('piyushmishra2501@gmail.com');     // Add a recipient
    $mail->addReplyTo('piyushmishra2501@gmail.com');
    //Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'piyush' ;

	$mailContent = '
<h2>Eri</h2>
<p>Eri</p>
<p>Eri</p>';

    $mail->Body    = $mailContent ;
    $mail->send();

if(!$mail->send()){
    echo 'Message could not be sent.';
    echo 'Error: '. $mail->ErrorInfo;
}else{
	echo 'Message has been sent';
}	

?>