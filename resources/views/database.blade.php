@extends('templates.page')

@section('title')
Model Legislation
@endsection

@section('breadcrumb')
ML Database
@endsection

@section('left-side')
<p>A list of our stored legislation.</p>

<p>Search the database.</p>
<div class="row">
  <div class="col-md-12">
    <div class="panel panel-default">
      <div class="panel-body">
{!! Form::open(['action' => 'BlogController@store','class' => 'form-horizontal']) !!}
{!! Form::token(); !!}
<div class="form-group">
<div class="col-md-1" style="display:padding-right:0px;width:7%; line-height:50px;">
We,
</div>
<div class="col-md-4" style="padding:0;">
{!! Form::text('db-legbody',null,['class' => 'form-control']); !!}
</div>
<div class="col-md-1" style="padding-left:7px; width:7%; padding-right:0;line-height:50px;">
  from
</div>
<div class="col-md-5"style="padding-left:0px;">
  {!! Form::text('db-citystate',null,['class' => 'form-control']); !!}
</div>
</div>

{!! Form::submit('Submit',['class' => 'btn btn-default']); !!}
{!! Form::close() !!}
</div>
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
      <th>Category</th>
      <th>Summary</th>
    </tr>
  </thead>
  <tbody>
    @if (sizeof($legislation)!=0)
      @foreach($legislation as $l)
      <tr>
        <td>{{$l->mleg_id}}</td>
        <td>{{$l->title_of_model_legislation}}</td>
        <td>{{$l->category}}</td>
        <td><a href="legislation/{{$l->mleg_id }}">{{$l->summary}}</a></td>
      </tr>
      @endforeach
    @else
    No legislation found.
    @endif
  </tbody>
</table>
@endsection
