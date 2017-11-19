@extends('templates.main')

@section('heading')
{{$legislation->title_of_model_legislation}}
@endsection

@section('subheading')
<strong>Category</strong> - {{$legislation->category}}
@endsection

@section('content')
<h3>Summary</h3> {{$legislation->summary}}
@endsection

@section('sub-block-2')
<div class="row heading-1 mb-60 clearfix">
  <div class="col-xs-12 col-sm-12  col-md-2">
  </div>
  <div class="col-xs-12 col-sm-12  col-md-10">
<h4>Full Text</h4> {{$legislation->text_of_model_legislation}}
</div>
</div>
@endsection
