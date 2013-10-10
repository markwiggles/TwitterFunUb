<?php

//Trying to get this to run from browser 

function runTwitter($trackWords) {
    $cmd = "php MyFilter.php ".escapeshellarg(serialize($trackWords));
    exec($cmd . " > /dev/null &");
}

?>
