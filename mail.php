<?php
require 'vendor/autoload.php';

use SparkPost\SparkPost;
use GuzzleHttp\Client;
use Ivory\HttpAdapter\Guzzle6HttpAdapter;

$httpAdapter = new Guzzle6HttpAdapter(new Client());
$sparky = new SparkPost($httpAdapter, ['key'=>getEnv('SPARKPOST_API_KEY')]);

$results = $sparky->transmission->send([
    'from'=> 'name' . getEnv('SPARKPOST_SANDBOX_DOMAIN'),
    'html'=>'<html><body>
       mmkmdkmmdkmdkmdkdkmd 
        </body></html>',
    'subject'=> 'Oh hey!',
    'recipients'=>[
      ['address'=>['email'=>'info@bennyhotellagos.com']]
    ]
]);

?>