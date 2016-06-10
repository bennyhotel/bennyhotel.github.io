<?php
require('class.phpmailer.php');
$mail = new PHPMailer();

$name = $_POST['name'];
$email = $_POST['email'];
$message = $_POST['message'];

$mail->IsSMTP();
$mail->SMTPAuth = true; // enable SMTP authentication
$mail->SMTPSecure = "ssl"; 
$mail->SMTPDebug = 2;
$mail->Host = "smtp.gmail.com";
$mail->Port = 465; // set the SMTP port
$mail->Username = "chineduabalog@gmail.com";
$mail->Password = "1pmsschool"; 
$mail->From = $email;
$mail->FromName = $name;
$mail->AddAddress("info@bennyhotellagos.com");

$mail->isHTML(true);

$mail->Subject = "Contact form";
$mail->Body = $message;

// SEND TO YOURSELF

$mail->addReplyTo( $email, $name );
$mail->addAddress( 'info@bennyhotellagos.com', 'Benny Hotel' );
$mail->send();

// CLEAR REPLY TO AND RECIPIENTS 

$mail->clearReplyTos();
$mail->clearAllRecipients();

// SEND TO THE USER

$mail->addAddress( $email, $first_name );
$mail->addReplyTo( 'your@email.com', 'You' );

if(!$mail->Send())
{
    echo 'Message was not sent.';
    echo 'Mailer error: ' . $mail->ErrorInfo;
}
else
{
    header("Location: /thankyou2.html");
}
?>