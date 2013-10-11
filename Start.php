<?php

/*
 * file to process the form data from index.php, 
 * executes the code to start the long running process
 * which will get tweets from the server
 * 
 * Parameter: $trackWords - the words to pass to the Twitter API
 */

//comma separated values to array
$postedData = $_POST['trackWords'];
$trackWords = explode(",", $postedData);

//execute the php script sending a serialized array of the trackwords
$cmd = "php MyFilter.php " . escapeshellarg(serialize($trackWords));
$pid = exec("nohup $cmd > /dev/null 2>&1 & echo $!");

//send the pid to the browser
print $pid;
?>
