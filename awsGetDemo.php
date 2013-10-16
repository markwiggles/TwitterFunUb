<?php
//require 'AWSSDKforPHP/aws.phar';
require 'vendor/autoload.php';

use Aws\DynamoDb\DynamoDbClient;
echo 'sachi';
$client = DynamoDbClient::factory(array(
    'key'    => 'AKIAIK7RCPMWTZVQWJIA',
    'secret' => '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',
    'region' => 'us-west-2'
));

//$iterator = new ItemIterator($client->getScanIterator(array('TableName' => 'tweets')));
//// Each item will contain the attributes we added
//foreach ($iterator as $item) {
//    // Grab the time number value
//    echo $item['followers_count'] . "\n";
//    // Grab the error string value
//    echo $item->get('text') . "\n";
//}
echo 'hi';
$result = $client->scan(array(
    'TableName' => 'tweets',
));
echo 'hello';
foreach ($result['Items'] as $item) {
    // Do something with the $item
}
?>
