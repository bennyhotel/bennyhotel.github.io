<?php 

require 'vendor/autoload.php';

$mail = new PHPMailer;

if(isset($_POST['submit'])){
    $name = $_POST['name'];
    $email_address = $_POST['email_address'];
    $phone_number = $_POST['phone_number'];
    $room_type = $_POST['room_type'];
    $no_of_lodgers = $_POST['no_of_lodgers'];
    $check_in_date = $_POST['check_in_date'];
    $check_out_date = $_POST['check_out_date'];
    $mail->isSMTP();                                      // Set mailer to use SMTP
    $mail->Host = 'smtp.mailgun.org';  // Specify main and backup SMTP servers
    $mail->SMTPAuth = true;                               // Enable SMTP authentication
    $mail->Username = 'postmaster@sandbox173725272456427b80374db0775c1d92.mailgun.org';                 // SMTP username
    $mail->Password = '0280a862b6e94a03ff04d30b66adbee0';                           // SMTP password
    $mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
    $mail->Port = 465;                                    // TCP port to connect to

    $mail->setFrom( $email_address , $name );
    $mail->addAddress('info@bennyhotellagos.com', 'Chinedu Abalogu');     // Add a recipient
    $mail->isHTML(true);                                  // Set email format to HTML

    $mail->Subject = 'Someone has made a reservation';
    $mail->Body    = '<b>name:' . $name . '</b>
                      <p><b>phone number:' . $phone_number . '</b><p>
                      <p><b>name:' . $room_type . '</b></p>
                      <p><b>name:' . $no_of_lodgers . '</b></p>
                      <p><b>name:' . $check_in_date . '</b></p>
                      <p><b>name:' . $check_out_date . '</b></p>';

    if(!$mail->send()) {
        header("Location: /error.html");
    } else {
        header("Location: /thankyou.html");
    }
}

?>