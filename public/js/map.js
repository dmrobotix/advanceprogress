$(document).ready(function() {
  $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });

  $("#submit-map").on("click", function(event) {
    event.preventDefault();

      $.ajax({
        type:"POST",
        url:"/map",
        data: $(this).serialize()
      })

      .done(function(response) {
        var data = JSON.parse(response);
        if (data) {
            // Load the Visualization API and the corechart package.
            google.charts.load('current', {'packages':['geochart'],
            'mapsApiKey': 'AIzaSyCe6FuYoNIpBeOJLexeA1zUZe0gqd-n9Es'
            });


            // Set a callback to run when the Google Visualization API is loaded.
            google.charts.setOnLoadCallback(drawRegionsMap);

            // Callback that creates and populates a data table,
            // instantiates the pie chart, passes in the data and
            // draws it.
            function drawRegionsMap() {

              // Create the data table.
              var data = google.visualization.arrayToDataTable([{{data}}]);

              // Set chart options
              var options = {
                region: 'US', // USA
                resolution: 'provinces',
                colorAxis: {colors: ['red', 'yellow' , 'white', 'purple']},
                backgroundColor: '#81d4fa',
                datalessRegionColor: '#f8bbd0',
                defaultColor: '#f5f5f5',
              };

              // Instantiate and draw our chart, passing in some options.
              var chart = new google.visualization.GeoChart(document.getElementById('geochart-colors'));
              google.visualization.events.addListener(chart, 'select', function() {
                var selectionIdx = chart.getSelection()[0].row;
                var countryName = data.getValue(selectionIdx, 0);
                var countryValue = data.getValue(selectionIdx,1);
                window.open('https://advanceprogress.org');
                console.log(selectionIdx);
                console.log(countryName);
                console.log(countryValue);
            });
              chart.draw(data, options);
            }
        }
      });

  });

});
