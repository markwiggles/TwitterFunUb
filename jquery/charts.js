
// Load the Visualization API and the piechart package.
      google.load('visualization', '1.0', {'packages':['corechart']});

      // Set a callback to run when the Google Visualization API is loaded.
      google.setOnLoadCallback(drawChart1);

      // Callback that creates and populates a data table,
      // instantiates the pie chart, passes in the data and
      // draws it.
      function drawChart1() {

        // Create the data table.
        var data1 = new google.visualization.DataTable();
        data1.addColumn('string', 'Sentiment');
        data1.addColumn('number', 'Type');
        data1.addRows([
          ['Positive', 3],
          ['Neutral', 1],
          ['Negative', 1]
        ]);

        // Set chart options
        var options1 = {'title':'Trending Sentiment',
                       'width':400,
                       'height':300};

        // Instantiate and draw our chart, passing in some options.
        var chart1 = new google.visualization.PieChart(document.getElementById('chart1'));
        chart1.draw(data1, options1);
      }

      google.load("visualization", "1", {packages:["corechart"]});
      google.setOnLoadCallback(drawChart2);
      function drawChart2() {
        var data2 = google.visualization.arrayToDataTable([
          ['Time', 'Sentiment'],
          ['1',  1000],
          ['2',  1170],
          ['3',  660],
          ['4',  1030]
        ]);

        var options2 = {
          title: 'Sentiment Tracking'
        };

        var chart2 = new google.visualization.LineChart(document.getElementById('chart2'));
        chart2.draw(data2, options2);
      }

