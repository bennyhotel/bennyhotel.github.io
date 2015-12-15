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
    'html' => "Name: " . $name . " email: " . $email_address . " Phone number: " . $phone_number. " is checking in on: " . $check_in_date . " and checking out on: " . $check_out_date . " room type: " .    $room_type . " number of peope: " . $no_of_lodgers,
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

    // $template_content = array(
    //     array(
    //         'name' => 'main',
    //         'content' => $first_name ."". $last_name . "\n\n" . $mes  ),
    //     array(
    //         'name' => 'footer',
    //         'content' => 'Copyright 2012.')

    // );

    print_r($mandrill->messages->send($message, $async=false, $ip_pool=null, $send_at=null));


    // echo "Mail Sent. Thank you " . $name . ", we will contact you shortly.";
    // You can also use header('Location: thank_you.php'); to redirect to another page.
    }
?>

