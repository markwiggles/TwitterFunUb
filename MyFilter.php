<?php

require_once('lib/Phirehose.php');
require_once('lib/OauthPhirehose.php');
require_once('AWSinsertTweets.php');

/**
 * class using Phirehose to display a live filtered stream using track words 
 */
class FilterTrackConsumer extends OauthPhirehose {

    /**
     * Enqueue each status
     * @param string $status
     */
    public function enqueueStatus($status) {     
        
        $tweet = json_decode($status);
        
        storeTweetsInDatabase($tweet); //what we want to do
        //print $tweet->{'text'}."\n";  //testing only
    }
}


// The OAuth credentials
define("TWITTER_CONSUMER_KEY", "svZXJI1VwflpveNZcLKgw");
define("TWITTER_CONSUMER_SECRET", "NR6GEcj09DCBn1K2nNtfYM4wp7bBHXnRkD2ekuI");
define("OAUTH_TOKEN", "543781426-Q2Y6IugeGaoA9tGh5PrpkPH00MFtQ2PbqsiVHRN6");
define("OAUTH_SECRET", "hVNkoq7IbpzmD3wi57gF2tUU8bbgZ3Kv9wKJ2JPk2o");

//gets the trackwords from the command live ie the exec command in Start.php
$trackWords = unserialize($argv[1]);
//$trackWords = array('justin bieber'); //testing only ie no-one more popular than Justin is there?

// Create the stream object from above class and start streaming
$sc = new FilterTrackConsumer(OAUTH_TOKEN, OAUTH_SECRET, Phirehose::METHOD_FILTER);
$sc->setTrack($trackWords);
$sc->consume();

