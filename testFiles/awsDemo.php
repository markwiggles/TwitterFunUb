<?php

require 'AWSSDKforPHP/aws.phar';

echo "test";

use Aws\DynamoDb\DynamoDbClient;

$client = DynamoDbClient::factory(array(
            'key' => 'AKIAI53QB74DUBQX5XEQ',
            'secret' => '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',
            'region' => 'us-west-2'
        ));

function createTable() {
// Create an "errors" table
    $client->createTable(array(
        'TableName' => 'errors',
        'AttributeDefinitions' => array(
            array(
                'AttributeName' => 'id',
                'AttributeType' => 'N'
            ),
            array(
                'AttributeName' => 'time',
                'AttributeType' => 'N'
            )
        ),
        'KeySchema' => array(
            array(
                'AttributeName' => 'id',
                'KeyType' => 'HASH'
            ),
            array(
                'AttributeName' => 'time',
                'KeyType' => 'RANGE'
            )
        ),
        'ProvisionedThroughput' => array(
            'ReadCapacityUnits' => 10,
            'WriteCapacityUnits' => 20
        )
    ));
}

$time = time();

$result = $client->putItem(array(
    'TableName' => 'errors',
    'Item' => $client->formatAttributes(array(
        'id' => 1201,
        'time' => $time,
        'error' => 'Executive overflow',
        'message' => 'no vacant areas'
    )),
    'ReturnConsumedCapacity' => 'TOTAL'
        ));

// The result will always contain ConsumedCapacityUnits
echo $result->getPath('ConsumedCapacity/CapacityUnits') . "\n";

/*
  User Name	Password
  Wigglesworth	oOkJ[jr8rRc^

  User Name	Access Key Id
  Wigglesworth	AKIAI53QB74DUBQX5XEQ

  Direct Signin Link
  https://043994570350.signin.aws.amazon.com/console

  Secret Access Key
  wkbEEt9WwcSrfAgc3tkvvoaEMvs4vsDfD1JGa80a
 */
?>
