<?php



require_once('lib/Phirehose.php');
require_once('lib/OauthPhirehose.php');
require_once('DbTweet.php');

/**
 * Example of using Phirehose to display a live filtered stream using track words 
 */
class FilterTrackConsumer extends OauthPhirehose {

    /**
     * Enqueue each status
     * @param string $status
     */
    public function enqueueStatus($status) {     
        $tweet = json_decode($status); 
        storeTweetsInDatabase($tweet);
        print $tweet->{'text'}."\n";
        
    }
}

// The OAuth credentials
define("TWITTER_CONSUMER_KEY", "QIcl8A33EnpTpGPnpMmZQ");
define("TWITTER_CONSUMER_SECRET", "Xdkpo2d5VGOooo19s23DmRmuQfzE1USLIiyed5AUAk");
define("OAUTH_TOKEN", "543781426-vQHaUYV0qjbT9RomJHbXNcyPFpBdn4GdbX2LM8");
define("OAUTH_SECRET", "7BDQbxjU6stVMVVOMnYfkgPp7GYtXmu187WuVbsC4");

$trackWords = unserialize($argv[1]);

// Create the stream object from above class and start streaming
$sc = new FilterTrackConsumer(OAUTH_TOKEN, OAUTH_SECRET, Phirehose::METHOD_FILTER);
$sc->setTrack($trackWords);
$sc->consume();
