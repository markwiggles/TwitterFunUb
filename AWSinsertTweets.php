<?php

//for testing purposes
ini_set('display_errors', 1);
ini_set('log_errors', 1);
ini_set('error_log', dirname(__FILE__) . '/error_log.txt');
error_reporting(E_ALL);


require 'AWSSDKforPHP/aws.phar';
require_once('lib/TwitterSentimentAnalysis.php');

use Aws\DynamoDb\DynamoDbClient;

// Configure  Datumbox API Key. 
define('DATUMBOX_API_KEY', '78006b9cafa5dbd4f0b57f6ae0c897d7');

function storeTweetsInDatabase($tweet) {

    //the client connection
    $client = DynamoDbClient::factory(array(
                'key' => 'AKIAIK7RCPMWTZVQWJIA',
                'secret' => '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',
                'region' => 'us-west-2'
    ));

    //get lastId from database initially then keep adding 1
    
   
  

    //Clean the inputs before storing
    $twitterId = mysql_real_escape_string($tweet->{'id'});
    $text = mysql_real_escape_string($tweet->{'text'});
    $screen_name = mysql_real_escape_string($tweet->{'user'}->{'screen_name'});
    $profile_image_url = mysql_real_escape_string($tweet->{'user'}->{'profile_image_url'});
    $followers_count = mysql_real_escape_string($tweet->{'user'}->{'followers_count'});

    //idexId and the created_at time
    $indexId = 1000;
    $rangeId = time();
    $created_at = time();
    
    $tableName = 'tweets';

    //get the sentiment 
    $TwitterSentimentAnalysis = new TwitterSentimentAnalysis(DATUMBOX_API_KEY);
    $sentiment = 'positive';//$TwitterSentimentAnalysis->sentimentAnalysis($text);

    //We store the new post in the database, to be able to read it later
    //insert into AWS dynamoDb
    $result = $client->putItem(array(
        'TableName' => $tableName,
        'Item' => array(
            'indexId' => array('N' => $indexId),
            'rangeId' => array('N' => $rangeId),
            'twitter_id' => array('N' => $twitterId),
            'created_at' => array('N' => $created_at ),
            'text' => array('S' => $text),
            'screen_name' => array('S' => $screen_name),
            'profile_image_url' => array('S' => $profile_image_url),
            'followers_count' => array('N' => $followers_count),
            'sentiment' => array('S' => $sentiment)
            ),
    ));

    flush();
}

    //function to get the start value
    function getStartValue($client) {

        $result = $client->getItem(array(
            'TableName' => 'start_value',
            'ConsistentRead' => true,
            'Key' => array(
                'id' => array('S' => 'start'),
            )
        ));

        return $result['Item']['value']['N'];
    }

?>
