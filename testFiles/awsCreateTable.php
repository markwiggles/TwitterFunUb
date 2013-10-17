<?php

ini_set('display_errors', 1);
 ini_set('log_errors', 1);
 ini_set('error_log', dirname(__FILE__) . '/error_log.txt');
 error_reporting(E_ALL);

/*
Create a table in the AWS dynamoDb database
 */

require 'AWSSDKforPHP/aws.phar';

use Aws\DynamoDb\DynamoDbClient;
use Aws\DynamoDb\Enum\KeyType;
use Aws\DynamoDb\Enum\Type;


$client = DynamoDbClient::factory(array(
    'key'    => 'AKIAIK7RCPMWTZVQWJIA',
    'secret' => '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',
    'region' => 'us-west-2'
));


    $result = $client->createTable(array(
        
        'TableName' => 'last_start_value',
        
        'AttributeDefinitions' => array(
            
            array(
                'AttributeName' => 'start',
                'AttributeType' => 'N'
            )
        ),
        'KeySchema' => array(
            array(
                'AttributeName' => 'start',
                'KeyType' => 'HASH'
            )

        ),
        'ProvisionedThroughput' => array(
            'ReadCapacityUnits' => 10,
            'WriteCapacityUnits' => 20
        )
    ));
    
print_r ($result->getPath('TableDescription'));


?>
