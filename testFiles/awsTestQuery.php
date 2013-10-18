<?php

//for testing purposes
ini_set('display_errors', 1);
ini_set('log_errors', 1);
ini_set('error_log', dirname(__FILE__) . '/error_log.txt');
error_reporting(E_ALL);


require 'AWSSDKforPHP/aws.phar';

use Aws\DynamoDb\DynamoDbClient;

use Aws\DynamoDb\Enum\ComparisonOperator;
use Aws\DynamoDb\Enum\Type;

// Instantiate the client with your AWS credentials
$client = DynamoDbClient::factory(array(
            'key' => 'AKIAIK7RCPMWTZVQWJIA',
            'secret' => 'ZL/y/465lJ3L0wO8S0Wobu2MBKMSmkz4+4Osvw3v',
            'region' => 'us-west-2'
        ));

$time = time();

//// Find the number of orders made by customer 941 in the last 10 days
$result = $client->query(array(
    'TableName'     => 'Orders',
    'IndexName'     => 'OrderDateIndex',
    'Select'        => 'COUNT',
    'KeyConditions' => array(
        'CustomerId' => array(
            'AttributeValueList' => array(
                array('N' => '941')
            ),
            'ComparisonOperator' => 'EQ'
        ),
        'OrderDate' => array(
            'AttributeValueList' => array(
                array('N' => strtotime("-10 days"))
            ),
            'ComparisonOperator' => 'GE'
        )
    )
));

$numOrders = $result['Count'];

print_r ($response['Items']);

?>
