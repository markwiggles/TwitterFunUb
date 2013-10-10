
// wait for the DOM to be loaded, then add ajax function to submit for starting tweets

pid = null;

$(document).ready(function() {

    $("#trackInput").submit(function(event) {

        event.preventDefault();

        var values = $(this).serialize();

        $.ajax({
            url: 'start.php',
            method: 'post',
            data: values
        }).success(function(response) {
            alert(response);
            pid = response;
        }).fail(function() {
            // Whoops; show an error.
        });
    });
});

// wait for the DOM to be loaded, then add ajax function to submit for stopping tweets
$(document).ready(function() {

    $("#stopTweets").submit(function(event) {

        event.preventDefault();

        var values = $(this).serialize();

        $.ajax({
            url: 'stop.php',
            method: 'post',
            data: values
        }).success(function(response) {
            alert(response);
        }).fail(function() {
            // Whoops; show an error.
        });
    });
});