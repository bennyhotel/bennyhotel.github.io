<?php
require 'vendor/autoload.php';

use SparkPost\SparkPost;
use GuzzleHttp\Client;
use Ivory\HttpAdapter\Guzzle6HttpAdapter;

$httpAdapter = new Guzzle6HttpAdapter(new Client());
$sparky = new SparkPost($httpAdapter, ['key'=>getEnv('SPARKPOST_API_KEY')]);

$name = $_POST['name'];
$email = $_POST['email'];
$message = $_POST['message'];

$results = $sparky->transmission->send([
    'from'=> $name . getEnv('SPARKPOST_SANDBOX_DOMAIN'),
    'html'=>'<html><body>
        <p>Name: $name</p>
        <p>email: $email</p>
        <h6>message: $message</h6>
        </body></html>',
    'subject'=> 'Oh hey!',
    'recipients'=>[
      ['address'=>['email'=>'info@bennyhotellagos.com']]
    ]
]);

header("Location: /thankyou2.html");
?>