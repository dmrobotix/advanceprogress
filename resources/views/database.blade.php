@extends('templates.page')

@section('title')
Model Legislation
@endsection

@section('breadcrumb')
ML Database
@endsection

@section('left-side')

{!! Form::open(['id' => 'modelleg-submit']) !!}
<div class="form-group">
  <div class="row">
    <div class="col-md-5">
  {!! Form::label('lb-legislature', 'Be it enacted by the legislature of the state of'); !!}
</div>
<div class="col-md-4">
 {!! Form::select('state', ['AL' => 'Alabama', 'AK' => 'Alaska',
 'AZ' => 'Arizona', 'AR' => 'Arkansas', 'CA' => 'California', 'CO' => 'Colorado',
 'CT' => 'Connecticut', 'DE' => 'Delaware', 'DC' => 'District of Columbia',
 'FL' => 'Florida', 'GA' => 'Georgia', 'HI' => 'Hawaii', 'ID' => 'Idaho',
 'IL' => 'Illinois', 'IN' => 'Indiana', 'IA' => 'Iowa', 'KS' => 'Kansas',
 'KY' => 'Kentucky', 'LA' => 'Louisiana', 'ME' => 'Maine', 'MD' => 'Maryland',
 'MA' => 'Massachusetts', 'MI' => 'Michigan', 'MN' => 'Minnesota',
 'MO' => 'Missouri', 'MT' => 'Montana', 'NE' => 'Nebraska', 'NV' => 'Nevada',
 'NH' => 'New Hampshire', 'NJ' => 'New Jersey', 'NM' => 'New Mexico',
 'NY' => 'New York', 'NC' => 'North Carolina', 'ND' => 'North Dakota',
 'OH' => 'Ohio', 'OK' => 'Oklahoma', 'OR' => 'Oregon', 'PA' => 'Pennsylvania',
 'RI' => 'Rhode Island', 'SC' => 'South Carolina', 'SD' => 'South Dakota',
 'TN' => 'Tennessee', 'TX' => 'Texas', 'UT' => 'Utah', 'VT' => 'Vermont',
 'VA' => 'Virginia', 'WA' => 'Washington', 'WV' => "West Virginia",
 'WI' => "Wisconsin", 'WA' => 'Washington'], null, ['placeholder' => 'Pick a state']); !!}
</div>
<div class="col-md-3">
  {!! Form::submit('Submit',['class' => 'btn btn-default']); !!}
  {!! Form::close() !!}
</div>
</div>
</div>

@endsection

@section('content')
<table class="table">
  <thead>
    <tr>
      <th>#</th>
      <th>Title</th>
      <th>Type</th>
      <th>Summary</th>
    </tr>
  </thead>
  <tbody id="modleg-results">
    @if (sizeof($legislation)!=0)
      @foreach($legislation as $l)
      <tr>
        <td>{{$l->mleg_id}}</td>
        <td>{{$l->title_of_model_legislation}}</td>
        <td>{{$l->type}}</td>
        <td><a href="legislation/{{$l->mleg_id }}">{{$l->summary}}</a></td>
      </tr>
      @endforeach
    @else
    No legislation found.
    @endif
  </tbody>
</table>
@endsection
