<?php

//for testing purposes
ini_set('display_errors', 1);
ini_set('log_errors', 1);
ini_set('error_log', dirname(__FILE__) . '/error_log.txt');
error_reporting(E_ALL);

/*
  gets the tweets from the AWS database
 */

require 'AWSSDKforPHP/aws.phar';

use Aws\DynamoDb\DynamoDbClient;

$client = DynamoDbClient::factory(array(
            'key' => 'AKIAIK7RCPMWTZVQWJIA',
            'secret' => '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',
            'region' => 'us-west-2'
        ));

//get the start value which has been sent by the ajax method
if (isset($_GET['start'])) {
    $start = mysql_real_escape_string($_GET['start']);
} else {
    $start = 0;
    //$start = getStartValue($client);
}

//create the key value attributes, based on the start value
$keyValues = array();
for ($i = 0; $i < 10; $i++) {
    array_push($keyValues, "'" . $start + $i . "'");
}

getTweetsFromAWS($client, $keyValues);


/*
 * function to get the tweets from the AWS database, passing the start value from the browser (if there is one)
 * else defaults to the last start value - ir the last tweet in the database
 */

function getTweetsFromAWS($client, $keyValues) {

    $tableName = 'tweets7';
    $keys = array();

// Build the array for the "Keys" parameter
    foreach ($keyValues as $values) {

        list($hashKeyValue) = $values;
        $keys[] = array(
            'id' => array('N' => $hashKeyValue),
        );
    }

// Get multiple items by key in a BatchGetItem request
    $response = $client->batchGetItem(array(
        'RequestItems' => array(
            $tableName => array(
                'Keys' => $keys,
                'ConsistentRead' => true
            )
        )
    ));

    $result = $response->getPath("Responses/{$tableName}");

    //send the json file out
    $json = json_encode($result);
    print $json;
}

//function to get the start value
function getStartValue($client) {

    $result = $client->getItem(array(
        'TableName' => 'last_start_value',
        'ConsistentRead' => true,
        'Key' => array(
            'id' => array('S' => 'start'),
        )
    ));

    return $result['Item']['value']['N'];
}

?>
