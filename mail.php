<?php
require 'vendor/autoload.php';

SparkPost::setConfig(["key"=>getEnv("SPARKPOST_API_KEY")]);
try {
    // Build your email and send it!
    Transmission::send(array('campaign'=>'first-mailing',
            'from'=>'test@' . getEnv("SPARKPOST_SANDBOX_DOMAIN"), // 'test@sparkpostbox.com'
            'subject'=>'Hello from php-sparkpost',
            'html'=>'<html><body><h1>Congratulations, {{name}}!</h1><p>You just sent your very first mailing!</p></body></html>',
            'text'=>'Congratulations, {{name}}!! You just sent your very first mailing!',
            'substitutionData'=>array('name'=>'YOUR FIRST NAME'),
            'recipients'=>array(array('address'=>array('name'=>'YOUR FULL NAME', 'email'=>'info@bennyhotellagos.com' )))
    ));

    header("Location: /thankyou2.html");
} catch (Exception $err) {
    echo 'Whoops! Something went wrong';     var_dump($err);
} ?>