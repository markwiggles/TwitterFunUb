<?php

require 'AWSSDKforPHP/aws.phar';

use Aws\DynamoDb\DynamoDbClient;

$client = DynamoDbClient::factory(array(
            'key' => 'AKIAIK7RCPMWTZVQWJIA',
            'secret' => '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',
            'region' => 'us-west-2'
        ));

$time = time();

//$result = $client->putItem(array(
//    'TableName' => 'tweets',
//    'Item' => $client->formatAttributes(array(
//        'id'      => 388878396089840003,
//        'text'    => 'she is a good girl',
//        'screen_name'   => 'sachid',
//        'profile_image_url' => 'http://a0.twimg.com/profile_images/378800000578790',
//        'followers_count'   => 12,
//        'created_at'   => $time,
//        'sentiment'   => 'negative'
//    )),
//    'ReturnConsumedCapacity' => 'TOTAL'
//));

$comments = array('good', 'Great', 'FuN', 'NiCE', 'FANtastIC', 'SiLLy', 'OBligatoRY', 'TERRRRific', 'TopS', 'HarD');

for ($i = 0; $i < 10; $i++) {

    $id = $i;

    $result = $client->putItem(array(
        'TableName' => 'tweets7',
        'Item' => array(
            'id' => array('N' => $id),
            'twitter_id' => array('N' => '388878396089840006'),
            'created_at' => array('N' => $time),
            'text' => array('S' => 'life is '. $comments[$i]),
            'screen_name' => array('S' => 'annjrose'),
            'profile_image_url' => array('S' => 'http://a0.twimg.com/profile_images/378800000578890'),
            'followers_count' => array('N' => 121),
            'sentiment' => array('S' => 'positive')
        )
    ));
}

print_r($result);

?>
