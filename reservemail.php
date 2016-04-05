<?php 

require_once 'mandrill-api-php/src/Mandrill.php'; //Not required with Composer
$mandrill = new Mandrill('4gL731motIUIaR5XtcaYIw');

error_reporting(-1);
ini_set('display_errors', 'On');
set_error_handler("var_dump");

if(isset($_POST['submit'])){
    $name = $_POST['name'];
    $email_address = $_POST['email_address'];
    $phone_number = $_POST['phone_number'];
    $room_type = $_POST['room_type'];
    $no_of_lodgers = $_POST['no_of_lodgers'];
    $check_in_date = $_POST['check_in_date'];
    $check_out_date = $_POST['check_out_date'];
    $message = array(
    'subject' => 'Contact form message',
    'from_email' => 'no-reply@bennyhotel.com',
    'html' => "Name: " . $name . " \n email: " . $email_address . " \n Phone number: " . $phone_number. 
              "\n is checking in on: " . $check_in_date . "\n and checking out on: " . $check_out_date . 
              "\n room type: " .    $room_type . "\n number of people: " . $no_of_lodgers,
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

    
    $mandrill->messages->send($message, $async=false, $ip_pool=null, $send_at=null);
    }
    header("Location: /thankyou.html")

?>