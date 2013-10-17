<?php

ini_set('display_errors', 1);
ini_set('log_errors', 1);
ini_set('error_log', dirname(__FILE__) . '/error_log.txt');
error_reporting(E_ALL);



require 'AWSSDKforPHP/aws.phar';

use Aws\DynamoDb\DynamoDbClient;

$client = DynamoDbClient::factory(array(
            'key' => 'AKIAIK7RCPMWTZVQWJIA',
            'secret' => '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',
            'region' => 'us-west-2'
        ));

//$result = $client->scan(array(
//    'TableName' => 'tweets'
//));
//
////var_dump($result);
//foreach ($result['Items'] as $item) {
//    // Do something with the $item
//    //var_dump($item);
//    //echo $item->text;
//    echo $item['text']['S']." ";
//    echo $item['followers_count']['N']."<br>";
//}

$result2 = $client->getItem(array(
    'TableName' => 'tweets',
    'ConsistentRead' => true,
    'Key' => array(
        'id' => array('N' => '388878396089840009'),
        'created_at' => array('N' => '1381913689')
    )
        ));

echo $result2['Item']['text']['S'] . " ";



//BATCH GET ITEM

$keyValues = array(array('1201','1381803059'), array('1201','1381803212'));

$tableName = 'errors';
$keys = array();

        
// Given that $keyValues contains a list of your hash and range keys:
//     array(array(<hash>, <range>), ...)
// Build the array for the "Keys" parameter


foreach ($keyValues as $values) {
    
    list($hashKeyValue, $rangeKeyValue) = $values;
    
    $keys[] = array(
        'id' => array('N' => $hashKeyValue),
        'time' => array('N' => $rangeKeyValue)
    );
}

// Get multiple items by key in a BatchGetItem request
$resultB = $client->batchGetItem(array(
    'RequestItems' => array(
        $tableName => array(
            'Keys' => $keys,
            'ConsistentRead' => true
        )
    )
        ));
$items = $resultB->getPath("Responses/{$tableName}");

var_dump($items);
?>
