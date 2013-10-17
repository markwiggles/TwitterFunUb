<?php

require 'AWSSDKforPHP/aws.phar';
require_once('lib/TwitterSentimentAnalysis.php');

use Aws\DynamoDb\DynamoDbClient;

// Configure  Datumbox API Key. 
define('DATUMBOX_API_KEY', '78006b9cafa5dbd4f0b57f6ae0c897d7');

function storeTweetsInDatabase($tweet, $id) {

    //the client connection
    $client = DynamoDbClient::factory(array(
                'key' => 'AKIAIK7RCPMWTZVQWJIA',
                'secret' => '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',
                'region' => 'us-west-2'
    ));

    //Clean the inputs before storing
    $twitterId = mysql_real_escape_string($tweet->{'id'});
    $text = mysql_real_escape_string($tweet->{'text'});
    $screen_name = mysql_real_escape_string($tweet->{'user'}->{'screen_name'});
    $profile_image_url = mysql_real_escape_string($tweet->{'user'}->{'profile_image_url'});
    $followers_count = mysql_real_escape_string($tweet->{'user'}->{'followers_count'});

    //the created_at time
    $time = time();

    //get the sentiment 
    $TwitterSentimentAnalysis = new TwitterSentimentAnalysis(DATUMBOX_API_KEY);
    $sentiment = $TwitterSentimentAnalysis->sentimentAnalysis($text);

    //We store the new post in the database, to be able to read it later
    $ok = mysql_query("INSERT INTO tweets (id ,text ,screen_name ,profile_image_url, followers_count, created_at, sentiment) VALUES ('$id', '$text', '$screen_name', '$profile_image_url', '$followers_count', NOW(), '$sentiment')");
    if (!$ok) {
        echo "Mysql Error: " . mysql_error();
    }

    //insert into AWS dynamoDb
    $result = $client->putItem(array(
        'TableName' => 'tweets7',
        'Item' => array(
            'id' => array('N' => $id),
            'twitter_id' => array('N' => $twitterId),
            'created_at' => array('N' => $time),
            'text' => array('S' => $text),
            'screen_name' => array('S' => $screen_name),
            'profile_image_url' => array('S' => $profile_image_url),
            'followers_count' => array('N' => $followers_count),
            'sentiment' => array('S' => $sentiment)
        )
    ));


    print_r($result);

    flush();
}

//end storeTweetsInDatabase
?>
