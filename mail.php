<?php
require 'vendor/autoload.php';

$mail = new PHPMailer;

if(isset($_POST['submit'])){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];
    $mail->isSMTP();                                      // Set mailer to use SMTP
    $mail->Host = 'smtp.mailgun.org';  // Specify main and backup SMTP servers
    $mail->SMTPAuth = true;                               // Enable SMTP authentication
    $mail->Username = 'postmaster@sandbox173725272456427b80374db0775c1d92.mailgun.org';                 // SMTP username
    $mail->Password = '0280a862b6e94a03ff04d30b66adbee0';                           // SMTP password
    $mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
    $mail->Port = 465;                                    // TCP port to connect to

    $mail->setFrom( $email , $name );
    $mail->addAddress('info@bennyhotellagos.com', 'Chinedu Abalogu');     // Add a recipient
    $mail->isHTML(true);                                  // Set email format to HTML

    $mail->Subject = 'Someone has something to say about benny hotel';
    $mail->Body    = $message;
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    if(!$mail->send()) {
        header("Location: /error.html");
    } else {
        header("Location: /thankyou2.html");
    }
}

?>