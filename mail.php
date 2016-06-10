<?php
require("PHPMailer/PHPMailerAutoload.php");
$mail = new PHPMailer();

$name = $_POST['name'];
$email = $_POST['email'];
$message = $_POST['message'];

$mail->IsSMTP();
$mail->SMTPAuth = true; // enable SMTP authentication
$mail->SMTPSecure = "ssl"; 
$mail->Host = "plus.smtp.mail.yahoo.com";
$mail->Port = 465; // set the SMTP port
$mail->Username = "chineduabalog@yahoo.com";
$mail->Password = "pmsschool"; 
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
<!-- if(isset($_POST['submit'])){
    $mail->From = "sumthing@yahoo.com";
    $mail->FromName = "myname";
    $mail->AddAddress("you@example.com");
    $mail->Subject = "Test PHPMailer Message";
    $mail->Body = "Hi! \n\n This was sent with phpMailer_example3.php.";

    

    $name = $_POST['name'];
    $email = $_POST['email_address'];
    $message = $_POST['message'];
    $email->addTo('info@bennyhotellagos.com')
    ->setFrom('no-reply@bennyhotel.com')
    ->setSubject('Contact form')
    ->setText('Hello!')
    ->setHtml('<html><head><title> Contact Form</title><body>
                Name: $name\n<br>
                Email: $email\n<br>
                Message: $message <body></title></head></html>');

    $sendgrid->send($email);    
    header("Location: /thankyou2.html"); -->