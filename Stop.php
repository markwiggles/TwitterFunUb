<?php

/*
 * file to process form data from index.php, 
 * executes the code to stop the long running process
 * which gets tweets from the server
 * 
 * Parameter: $pid - the process identifier
 */

$pid = $_POST['stop'];

exec("kill $pid");

//send a message to the browser
print "stopped tweets with pid:" . $pid;
?>
