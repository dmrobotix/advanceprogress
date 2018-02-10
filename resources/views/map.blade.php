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
    ['Alabama', 30], ['Alaska', 54], ['Arizona', 109], ['Arkansas', 89],
    ['California', 12], ['Colorado', 3], ['Connecticut', 3],
    ['Delaware', 28], ['Florida', 15],
    ['Georgia', 4], ['Hawaii', 35], ['Idaho', 12],
    ['Illinois', 12], ['Indiana', 6],
    ['Iowa', 3], ['Kansas', 12],
    ['Kentucky', 26], ['Louisiana', 3], ['Maine', 15],
    ['Maryland', 9], ['Massachusetts', 0], ['Michigan', 13], ['Minnesota', 5],
    ['Mississippi', 10], ['Missouri', 12], ['Montana', 1],
    ['Nebraska', 29], ['Nevada', 6], ['New Hampshire', 32], ['New Jersey', null],
    ['New Mexico', 33], ['New York', 14], ['North Carolina', 12], ['North Dakota', 18],
    ['Ohio', 20], ['Oklahoma', 13], ['Oregon', 35],
    ['Pennsylvania', 32], ['Rhode Island', 25], ['South Carolina', 22],
    ['South Dakota', 14], ['Tennessee', 8], ['Texas', 1],
    ['Utah', 21], ['Vermont', 2], ['Virginia', 16],
    ['Washington', 0], ['West Virginia', 15],
    ['Wisconsin', 5], ['Wyoming', 8]
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
      var countryValue = data.getValue(selectionIx,1);
      window.open('');
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
    {!! Form::open(['action' => ['ExistingLegislationController@geochartData']]) !!}
    <div class="form-group">
    {!! Form::label('lb-search', 'Keyword'); !!}
    {!! Form::text('keyword', null, ['class' => 'form-control']); !!}
    </div>
    {!! Form::submit('Search!',['class' => 'btn btn-info']); !!}
    {!! Form::close() !!}
</div>
<h4>Our Partner</h4>
<div class="text">
    <p>We partner with over 320 amazing projects worldwide, and have given over $150 million in cash and product grants to other groups since 2011. We also operate our own dynamic suite of Signature Programs.</p>
</div>
@endsection

@section('left-side')
<div id="geochart-colors" style=""></div>
@endsection
