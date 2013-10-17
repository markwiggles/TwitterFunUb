<?php
require 'AWSSDKforPHP/aws.phar';

use Aws\DynamoDb\DynamoDbClient;

$client = DynamoDbClient::factory(array(
    'key'    => 'AKIAIK7RCPMWTZVQWJIA',
    'secret' => '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',
    'region' => 'us-west-2'
));

$result = $client->scan(array(
    'TableName' => 'tweets',
));

//var_dump($result);
foreach ($result['Items'] as $item) {
    // Do something with the $item
    //var_dump($item);
    //echo $item->text;
    echo $item['text']['S']." ";
    echo $item['followers_count']['N']."<br>";
}

$result = $client->getItem(array(
    'TableName' => 'tweets',
    'ConsistentRead' => true,
    'Key' => array(
        'id' => array(TYPE::NUMBER => 388878396089840009)
    ),
    'AttributesToGet' => array('text')
    
));

echo $item['text']['S']." ";



?>
