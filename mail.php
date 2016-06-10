<?php
require 'vendor/autoload.php';
use Mailgun\Mailgun;

# Instantiate the client.
$client = new \Http\Adapter\Guzzle6\Client(); 
$mailgun = new \Mailgun\Mailgun('key-e87bf6f1a276e57672a6cacabf72c97a', $client);
$domain = "sandbox173725272456427b80374db0775c1d92.mailgun.org";

# Make the call to the client.
$mailgun->sendMessage($domain, array(
    'from'    => 'Excited User <mailgun@YOUR_DOMAIN_NAME>',
    'to'      => 'Baz <info@bennyhotellagos.com>',
    'subject' => 'Hello',
    'text'    => 'Testing some Mailgun awesomness!'
));

?>