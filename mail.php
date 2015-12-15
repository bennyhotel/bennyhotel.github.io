<?php 

require_once 'mandrill-api-php/src/Mandrill.php'; //Not required with Composer
$mandrill = new Mandrill('4gL731motIUIaR5XtcaYIw');

error_reporting(-1);
ini_set('display_errors', 'On');
set_error_handler("var_dump");

if(isset($_POST['submit'])){
    $name = $_POST['name'];
    $email_address = $_POST['email_address'];
    $mes = $_POST['message'];
    $message = array(
    'subject' => 'Contact form message',
    'from_email' => 'no-reply@bennyhotel.com',
    'html' => $name . " email: " . $email_address . " wrote the following:" . "\n\n" . $mes ,
    'to' => array(array('email' => 'info@bennyhotellagos.com', 'name' => 'Benny Hotel front desk')),
    'merge_vars' => array(array(
        'rcpt' => 'recipient1@domain.com',
        'vars' =>
        array(
            array(
                'name' => 'FIRSTNAME',
                'content' => 'Recipient 1 first name'),
            array(
                'name' => 'LASTNAME',
                'content' => 'Last name')
        ))));

    print_r($mandrill->messages->send($message, $async=false, $ip_pool=null, $send_at=null));

    }
?>

