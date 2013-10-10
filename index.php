<?php

//include_once 'start.php';

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
//$trackInput = array('lady gaga','justin bieber');

//runTwitter($trackInput);
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="gl" lang="gl">
    <head>
        <title>Twitter alert viewer</title>
        <meta http-equiv="Content-type" content="text/html;charset=UTF-8" />
        <script src="jquery/jquery-1.10.2.min.js"></script>
        <script src="jquery/logic.js"></script>
        <script src="jquery/data.js"></script>
        <link rel="stylesheet" type="text/css" href="css/mainStylesheet.css"/>
    </head>
    <body>
        <div id="header">
               <h1>Twitter alert viewer</h1>
               <div id="input">
                   <form id="trackInput">
                       <input type="text" name="trackWords" placeholder="enter tracking words with commas separating"value="" size="60" />
                       <input type="submit" value="Get Tweets" name="getTweets" />
                   </form>
                 
                   <form id="stopTweets">
                       <input type="submit" value="Stop Tweets" name="stopTweets" />
                   </form>
                  
               </div>
               
               
            <a href="#" onclick="clearTimeout(timeOut);">Pause</a>
            <a href="#" onclick="poll();">Run</a>
        </div>
        <div id="tweets">  </div>
    </body>
</html>