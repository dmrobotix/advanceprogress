@extends('templates.page')

@section('title')
Existing Legislation Interactive Map
@endsection

@section('breadcrumb')
Interactive Map
@endsection

@section('maps')
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

<script type="text/javascript">

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
    var data = google.visualization.arrayToDataTable([
    ['State',   'Legislation'],

  ]);
  
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
</script>
@endsection

@section('content')
<h2>Together we can make a difference</h2>
<div class="text">
    <p>Some information regarding this interactive map should go here.</p>
    {!! Form::open(['action' => 'ExistingLegislationController@geochartData']) !!}
    <div class="form-group">
    {!! Form::label('lb-search', 'Keyword'); !!}
    {!! Form::text('keyword', null, ['class' => 'form-control']); !!}
    </div>
    {!! Form::submit('Search!',['class' => 'btn btn-info','id' => 'submit-map']); !!}
    {!! Form::close() !!}
</div>
@endsection

@section('left-side')
<div id="geochart-colors" style=""></div>
@endsection
